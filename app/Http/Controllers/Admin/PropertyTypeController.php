<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\City;
use App\Models\Form;
use App\Models\District;
use App\Lib\FormProcessor;
use App\Models\PropertyType;
use Illuminate\Http\Request;
use App\Rules\FileTypeValidate;
use App\Http\Controllers\Controller;

class PropertyTypeController extends Controller 
{

    public function index()
    {

        $propertyTypes = PropertyType::searchable(['name','name_ar'])->paginate(getPaginate());
        return view('admin.property_type.index', compact('propertyTypes'));
    }

    public function create()
    {
        $title = 'Create Property Type';
        $cities = City::all();
        return view('admin.property_type.create', compact('title', 'cities'));
    }



    public function store(Request $request, $id = null)
    {
        $validation = 'required';

        if ($id) {
            $validation = 'nullable';
        }

        $request->validate([
            // 'city_id' => 'required|exists:cities,id',
            'name' => 'required|string',
            'name_ar' => 'required|string',
            'description' => 'required|string',
            'icon' => [$validation, 'image', new FileTypeValidate(['jpg', 'jpeg', 'png'])],
        ]);

        if ($id) {
            $PropertyType = PropertyType::findOrFail($id);
            $message = 'Property type update successfully';
        } else {
            $PropertyType = new PropertyType();
            $message = 'Property type create successfully';
        }

        // $PropertyType->city_id = $request->city_id;
        $PropertyType->name = $request->name;
        $PropertyType->name_ar = $request->name_ar;
        $PropertyType->description = $request->description;

        if ($request->hasFile('icon')) {
            try {
                $old = $PropertyType->icon;
                $PropertyType->icon = fileUploader($request->icon, getFilePath('propertyType'), getFileSize('propertyType'), $old);
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Couldn\'t upload your image'];
                return back()->withNotify($notify);
            }
        }

        $PropertyType->save();
        $notify[] = ['success', $message];
        return to_route('admin.property.type.index')->withNotify($notify);
    }

    public function edit($id)
    {
        $title = 'Edit Property Type';
        $propertyType = PropertyType::findOrFail($id);
        $cities = City::all();
        return view('admin.property_type.create', compact('propertyType', 'title', 'cities'));
    }


    public function show($id)
    {

        $propertyType = PropertyType::find($id);
        $gn_name = 'propert_type_form_' . $id;
        $formTitle = 'Propety Type Form';
        $form = Form::where('act', $gn_name)->first();
        return view('admin.property_type.show', compact('propertyType', 'formTitle', 'form'));
    }

    public function showFieldUpdate(Request $request, $id)
    {

        $gn_name = 'propert_type_form_' . $id;
        $formProcessor = new FormProcessor();
        $generatorValidation = $formProcessor->generatorValidation();
        $request->validate($generatorValidation['rules'],$generatorValidation['messages']);
        $exist = Form::where('act',$gn_name)->first();
        if ($exist) {
            $isUpdate = true;
        }else{
            $isUpdate = false;
        }

        $formProcessor->generate($gn_name,$isUpdate,'act');

        $notify[] = ['success','Property type filed data updated successfully'];

        return back()->withNotify($notify);
    }

    public function status($id)
    {
        try{
            return PropertyType::changeStatus($id);
        }catch(Exception $e){
            $notify[] = ['error', 'Something went wrong'];
            return back()->withNotify($notify);
        }
    }

}
