<?php

namespace App\Http\Controllers\Admin;

use Mockery\Exception;
use App\Models\Country;
use App\Models\Property;
use App\Constants\Status;
use App\Models\PropertyType;
use App\Models\PropertyImage;
use App\Services\PropertyCrud;
use App\Rules\FileTypeValidate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use App\Http\Requests\Property\PropertyRequest;

class PropertyController extends Controller
{

    protected $error_message = "Something went wrong";

    protected $propertyCrud;

    public function __construct(PropertyCrud $propertyCrud)
    {
        return $this->propertyCrud = $propertyCrud;
    }

    public function index()
    {
        $properties = $this->propertyData();
        return view('admin.property.index', compact('properties'));
    }

    public function pending()
    {
        $properties = $this->propertyData('pending');
        return view('admin.property.index', compact('properties'));
    }

    public function review()
    {
        $properties = $this->propertyData('review');
        return view('admin.property.index', compact('properties'));
    }

    public function rejected()
    {
        $properties = $this->propertyData('rejected');
        return view('admin.property.index', compact('properties'));
    }

    public function published()
    {
        $properties = $this->propertyData('published');
        return view('admin.property.index', compact('properties'));
    }

    protected function propertyData($scope = null)
    {
        if ($scope) {
            $properties = Property::$scope();
        } else {
            $properties = Property::query();
        }
        return $properties->searchable(['country:name', 'city:name', 'propertyType:name'])->latest()->paginate(getPaginate());
    }

    public function create()
    {
        $propertyTypes = PropertyType::Active()->get();
        $countries = Country::orderByRaw('ISNULL(sort_order), sort_order')->with('city')->get();
        $property = Property::get();
        return view('admin.property.create', compact('propertyTypes', 'countries', 'property'));
    }

    public function store(PropertyRequest $request)
    {
        try {

            $property = new Property();
            $storeProperty = $this->propertyCrud->storeProperty($property, $request);

            $this->propertyCrud->propertyDetailStore($storeProperty, $request);

            if ($storeProperty && $request->hasFile('thumb_image')) {
                try {
                    $old = $storeProperty->images;
                    $storeProperty->thumb_image = fileUploader($request->thumb_image, getFilePath('property_thumb'), getFileSize('property_thumb'), $old);
                    $storeProperty->save();
                } catch (\Exception $e) {
                    $message = __('Couldn\'t upload your image');
                    return $this->redirectNotify('error', $message, 'admin.properties.index');
                }
            }

            $image = $this->insertImages($request, $storeProperty, $id = 0);

            if (!$image) {
                return response()->json([
                    'status' => 'error',
                    'message' => __("Couldn\'t upload account listing images"),

                ]);
            }

            $message = __('Property create successfully');
            return $this->redirectNotify('success', $message, 'admin.properties.index');

        } catch (Exception $e) {

            return $this->redirectNotify('error', $this->error_message, 'admin.properties.index');
        }
    }


    public function status($id, $status)
    {
        $property = Property::findOrFail($id);
        $property->status = $status;
        $property->save();
        $notify[] = ['success', __('Change Status Successfully')];
        return back()->withNotify($notify);

    }

    public function edit($id)
    {
        $property = Property::findOrFail($id);
        $propertyTypes = PropertyType::with('subproperty_types')->get();
        $countries = Country::orderByRaw('ISNULL(sort_order), sort_order')->get();

        $images = [];

        foreach ($property->images as $key => $image) {
            $img['id'] = $image->id;
            $img['src'] = getImage(getFilePath('property') . '/' . $image->image);
            $images[] = $img;
        }

        return view('admin.property.edit', compact('property', 'propertyTypes', 'countries', 'images'));
    }

    public function update(PropertyRequest $request, $id)
    {

        $request->validate([
            'thumb_image' => ['nullable', 'image', new FileTypeValidate(['jpg', 'jpeg', 'png'])],
            'images' => ['nullable', 'array', 'max:10'],
            'images.*' => ['nullable', 'image', new FileTypeValidate(['jpg', 'jpeg', 'png'])],
        ]);

        try {

            $property = Property::findOrFail($id);

            $storeProperty = $this->propertyCrud->storeProperty($property, $request);

            $this->propertyCrud->propertyDetailUpdate($storeProperty, $request);

            if ($storeProperty && $request->hasFile('thumb_image')) {
                try {
                    $old = $storeProperty->images;
                    $storeProperty->thumb_image = fileUploader($request->thumb_image, getFilePath('property_thumb'), getFileSize('property_thumb'), $old);
                    $storeProperty->save();
                } catch (\Exception $e) {
                    $message = __('Couldn\'t upload your image');
                    return $this->redirectNotify('error', $message, 'admin.properties.index');
                }
            }

            $image = $this->insertImages($request, $storeProperty, $id);

            if (!$image) {
                return response()->json([
                    'status' => 'error',
                    'message' => "Couldn\'t upload account listing images",

                ]);
            }

            $message = __('Property update successfully');
            return $this->redirectNotify('success', $message, 'admin.properties.index');

        } catch (Exception $e) {

            return $this->redirectNotify('error', $this->error_message, 'admin.properties.index');
        }
    }

    public function show($id)
    {
        $property = Property::with('propertyType', 'country', 'city', 'subPropertyType')->findOrFail($id);
        $propertyImages = PropertyImage::where('property_id', $id)->get();
        return view('admin.property.show', compact('property', 'propertyImages'));
    }

    protected function insertImages($request, $storeProperty, $id)
    {
        $path = getFilePath('property');

        if ($id) {
            $this->removeImages($request, $storeProperty, $path);
        }

        $hasImages = $request->file('images');

        if ($hasImages) {
            $size = getFileSize('property');
            $images = [];

            foreach ($hasImages as $file) {
                try {
                    $name = fileUploader($file, $path, $size, null);
                    $image = new PropertyImage();
                    $image->property_id = $storeProperty->id;
                    $image->image = $name;
                    $images[] = $image;
                } catch (\Exception $exp) {
                    return false;
                }
            }
            $storeProperty->images()->saveMany($images);
        }
        return true;
    }

    protected function removeImages($request, $storeProperty, $path)
    {
        $previousImages = $storeProperty->images->pluck('id')->toArray();
        $imageToRemove = array_values(array_diff($previousImages, $request->old ?? []));

        foreach ($imageToRemove as $item) {
            $propertyImage = PropertyImage::find($item);
            fileManager()->removeFile($path . '/' . $propertyImage->image);
            $propertyImage->delete();
        }
    }

}
