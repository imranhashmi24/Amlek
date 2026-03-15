<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use App\Models\Country;
use App\Models\PropertyType;
use Illuminate\Http\Request;
use App\Rules\FileTypeValidate;
use App\Models\PropertyTypeArea;
use App\Http\Controllers\Controller;

class PropertyTypeAreaController extends Controller
{
    public function index()
    {
        $propertyTypeAreas = PropertyTypeArea::searchable(['country:name', 'city:name'])->paginate(getPaginate());
        return view('admin.property_type_area.index', compact('propertyTypeAreas'));
    }

    public function create()
    {
        $title = 'Create Property Type Area';
        $countries = Country::orderByRaw('ISNULL(sort_order), sort_order')->with('city')->get();
        $propertyTypes = PropertyType::get();
        return view('admin.property_type_area.create', compact('title', 'countries', 'propertyTypes'));
    }

    public function store(Request $request, $id = null)
    {
        $validation = 'required';

        if ($id) {
            $validation = 'nullable';
        }

        $request->validate([
            'country_id' => 'required|exists:countries,id',
            'city_id' => 'required|exists:cities,id',
            'property_type_id' => 'required|exists:property_types,id',
            'image' => [$validation, 'image', new FileTypeValidate(['jpg', 'jpeg', 'png'])],
        ]);

        if ($id) {
            $PropertyTypeArea = PropertyTypeArea::findOrFail($id);
            $message = 'Property type area update successfully';
        } else {
            $PropertyTypeArea = new PropertyTypeArea();
            $message = 'Property type area create successfully';
        }

        $PropertyTypeArea->country_id = $request->country_id;
        $PropertyTypeArea->city_id = $request->city_id;
        $PropertyTypeArea->property_type_id = $request->property_type_id;

        if ($request->hasFile('image')) {
            try {
                $old = $PropertyTypeArea->image;
                $PropertyTypeArea->image = fileUploader($request->image, getFilePath('propertyTypeArea'), getFileSize('propertyTypeArea'), $old);
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Couldn\'t upload your image'];
                return back()->withNotify($notify);
            }
        }

        $PropertyTypeArea->save();

        $notify[] = ['success', $message];
        return to_route('admin.property.type.area.index')->withNotify($notify);

    }

    public function edit($id)
    {
        $title = 'Edit Property Type Area';
        $propertyTypeArea = PropertyTypeArea::findOrFail($id);
        $countries = Country::orderByRaw('ISNULL(sort_order), sort_order')->with('city')->get();
        $cities = City::where('country_id', $propertyTypeArea->country_id)->get();
        $propertyTypes = PropertyType::get();
        return view('admin.property_type_area.create', compact('title', 'countries', 'propertyTypes', 'propertyTypeArea', 'cities'));
    }

    public function status($id)
    {
        return PropertyTypeArea::changeStatus($id);
    }

}
