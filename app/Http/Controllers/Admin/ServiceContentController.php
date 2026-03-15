<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Illuminate\Http\Request;
use App\Models\ServiceContent;
use App\Rules\FileTypeValidate;
use App\Http\Controllers\Controller;

class ServiceContentController extends Controller
{
    public function store(Request $request, $id = null)
    {

        $validation = 'required';

        if ($id) {
            $validation = 'nullable';
        }


        $request->validate([
            "title"        => "required|string|max:191",
            "title_ar"     => "required|string|max:191",
            "sub_title"    => "nullable|string|max:191",
            "sub_title_ar" => "nullable|string|max:191",
            "description" => "nullable|string",
            "description_ar" => "nullable|string",
            'image' => [$validation, 'image', new FileTypeValidate(['jpg', 'jpeg', 'png'])],
        ]);

        if ($id) {
            $ServiceContent = ServiceContent::findOrFail($id);
            $message = 'Service content update successfully';
        } else {
            $ServiceContent = new ServiceContent();
            $message = 'Service content create successfully';
        }

        $ServiceContent->service_id = $request->service_id;
        $ServiceContent->title = $request->title;
        $ServiceContent->title_ar = $request->title_ar;
        $ServiceContent->sub_title = $request->sub_title;
        $ServiceContent->sub_title_ar = $request->sub_title_ar;
        $ServiceContent->description = $request->description;
        $ServiceContent->description_ar = $request->description_ar;


        if ($request->hasFile('image')) {
            try {
                $old = $ServiceContent->image;
                $ServiceContent->image = fileUploader($request->image, getFilePath('service_content'), getFileSize('service_content'), $old);
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Couldn\'t upload your image'];
                return back()->withNotify($notify);
            }
        }

        $ServiceContent->save();
        $notify[] = ['success', $message];
        return back()->withNotify($notify);
    }

    public function status($id)
    {
        try{
            return ServiceContent::changeStatus($id);
        }catch(Exception $e){
            $notify[] = ['error', 'Something went wrong'];
            return back()->withNotify($notify);
        }
    }
}
