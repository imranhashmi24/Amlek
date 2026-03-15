<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Form;
use App\Lib\FormProcessor;

use App\Models\PropertyType;
use Illuminate\Http\Request;
use App\Models\SubpropertyType;
use App\Rules\FileTypeValidate;
use App\Http\Controllers\Controller;

class SubpropertyTypeController extends Controller
{
    public function index()
    {

        $subpropertyTypes = SubpropertyType::searchable(['name','name_ar'])->paginate(getPaginate());
        return view('admin.sub_property_type.index', compact('subpropertyTypes'));
    }

    public function create()
    {
        $title = 'Create Sub Property Type';
        $property_types = PropertyType::all();
        return view('admin.sub_property_type.create', compact('title', 'property_types'));
    }

    public function store(Request $request, $id = null)
    {
        $validation = 'required';

        if ($id) {
            $validation = 'nullable';
        }

        $request->validate([
            'property_type_id' => 'required|exists:property_types,id',
            'name' => 'required|string',
            'name_ar' => 'required|string',
            'image' => [$validation, 'image', new FileTypeValidate(['jpg', 'jpeg', 'png'])],
        ]);

        if ($id) {
            $subpropertyType = SubpropertyType::findOrFail($id);
            $message = 'Sub Property type update successfully';
        } else {
            $subpropertyType = new SubpropertyType(); // corrected variable name
            $message = 'Sub Property type create successfully';
        }

        $subpropertyType->property_type_id = $request->property_type_id;
        $subpropertyType->name = $request->name;
        $subpropertyType->name_ar = $request->name_ar;

        if ($request->hasFile('image')) {
            try {
                $old = $subpropertyType->image;
                $subpropertyType->image = fileUploader($request->image, getFilePath('propertyType'), getFileSize('propertyType'), $old);
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Couldn\'t upload your image'];
                return back()->withNotify($notify);
            }
        }

        $subpropertyType->save();
        $notify[] = ['success', $message];
        return to_route('admin.sub.property.type.index')->withNotify($notify);
    }


    public function edit($id)
    {
        $title = 'Edit Sub Property Type';
        $subpropertyType = SubpropertyType::findOrFail($id);
        $property_types = PropertyType::all();
        return view('admin.sub_property_type.create', compact('subpropertyType', 'title', 'property_types'));
    }


    public function show($id)
    {

        $SubpropertyType = SubpropertyType::find($id);
        $gn_name = 'propert_type_form_' . $id;
        $formTitle = 'Propety Type Form';
        $form = Form::where('act', $gn_name)->first();
        return view('admin.sub_property_type.show', compact('SubpropertyType', 'formTitle', 'form'));
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
            return SubpropertyType::changeStatus($id);
        }catch(Exception $e){
            $notify[] = ['error', 'Something went wrong'];
            return back()->withNotify($notify);
        }
    }
}
