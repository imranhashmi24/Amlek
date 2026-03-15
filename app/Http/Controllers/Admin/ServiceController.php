<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Rules\FileTypeValidate;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    protected $create_title = "Create Service";

    protected $edit_title = "Edit Service";

    protected $error_message = "Something went wrong";


    public function index()
    {
        $services = Service::query()
                    ->Parent()
                    ->latest()
                    ->Searchable(['contents:title','contents:title_ar'])
                    ->paginate(getPaginate());

        return view('admin.services.index', compact('services'));
    }


    public function create()
    {
        try {
            $service = Service::get();
            return  view('admin.services.create', $service);

        } catch (Exception $e){
            return $this->redirectNotify('error', $this->error_message, 'admin.services.index');
        }
    }

    public function store(Request $request, $id = null)
    {
        try{

            $validation = 'required';

            if ($id) {
                $validation = 'nullable';
            }

            $request->validate([
                "type" => "required|string|max:191",
                "title" => "required|string|max:191",
                "title_ar" => "required|string|max:191",
                "image" => [$validation, 'image', new FileTypeValidate(['jpg', 'jpeg', 'png'])],
            ]);

            if($id){
                $service = Service::findOrFail($id);
                $message = 'Service update successfully';
            }else{
                $service = new Service();
                $message = 'Service create successfully';
            }

            $service->parent_id = $request->parent_id ?? null;
            $service->type = $request->type;
            $service->title = $request->title;
            $service->slug = Str::slug($request->title);
            $service->title_ar = $request->title_ar;


            if ($request->hasFile('image')) {
                try {
                    $old = $service->image;
                    $service->image = fileUploader($request->image, getFilePath('service'), getFileSize('service_content'), $old);
                } catch (\Exception $exp) {
                    $notify[] = ['error', 'Couldn\'t upload your image'];
                    return back()->withNotify($notify);
                }
            }

            $service->save();

            $notify[] = ['success', $message];
            return back()->withNotify($notify);

        }catch(Exception $e){

            return $this->redirectNotify('error', $e->getMessage(), 'admin.services.index');
        }
    }

    public function view($id)
    {

        $service = Service::with(['childrens.contents'])->findOrFail($id);

        return  view('admin.services.view', compact('service' ));

    }

    public function status($id)
    {
        try{
            return Service::changeStatus($id);
        }catch(Exception $e){
            return $this->redirectNotify('error', $this->error_message, 'admin.services.index');
        }
    }

    public function edit($id)
    {
        try {
            $service = Service::findOrFail($id);
            return  view('admin.services.create', compact('service'));

        } catch (Exception $e){
            return $this->redirectNotify('error', $e->getMessage(), 'admin.services.index');
        }
    }

}
