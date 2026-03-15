<?php

namespace App\Http\Controllers\Admin;

use App\Models\BusinessPost;
use Illuminate\Http\Request;
use App\Rules\FileTypeValidate;
use App\Models\BusinessCategory;
use App\Models\BusinesPostRequest;
use App\Http\Controllers\Controller;
use App\Models\BusinessRequest;

class BusinessPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $businessposts = BusinessPost::searchable(['businesscategory:name', 'businesstype:name'])->paginate(getPaginate());
        return view('admin.businessposts.index', compact('businessposts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['businesscategories'] = BusinessCategory::all();
        return view('admin.businessposts.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => ['required', 'image', new FileTypeValidate(['jpg', 'jpeg', 'png'])],
        ]);

        $businesspost = new BusinessPost();
        $businesspost->title = $request->title;
        $businesspost->title_ar = $request->title_ar;
        $businesspost->slug = $request->slug;
        $businesspost->slug_ar = $request->slug_ar;
        $businesspost->description = $request->description;
        $businesspost->description_ar = $request->description_ar;
        $businesspost->selling_price = $request->selling_price;
        $businesspost->selling_price_ar = $request->selling_price_ar;
        $businesspost->address = $request->address;
        $businesspost->address_ar = $request->address_ar;
        $businesspost->business_category_id = $request->business_category_id;
        $businesspost->business_type_id = $request->business_type_id;
        $businesspost->business_status = $request->business_status;
        $businesspost->employee_number = $request->employee_number;
        $businesspost->annual_income = $request->annual_income;
        $businesspost->company_age = $request->company_age;
        $businesspost->status = 1;

        if ($request->hasFile('image')) {
            try {
                $old = $businesspost->image;
                $businesspost->image = fileUploader($request->image, getFilePath('business_image'), getFileSize('business_image'), $old);
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Couldn\'t upload your image'];
                return back()->withNotify($notify);
            }
        }

        $businesspost->save();

        $notify[] = ['success', 'Business Post Successfully Created'];
        return to_route('admin.businesspost.index')->withNotify($notify);
    }

    /**
     * Display the specified resource.
     */
    public function show(BusinessPost $businessPost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data['businesscategories'] = BusinessCategory::all();
        $data['businesspost'] = BusinessPost::find($id);
        return view('admin.businessposts.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'image' => ['nullable', 'image', new FileTypeValidate(['jpg', 'jpeg', 'png'])],
        ]);

        $businesspost = BusinessPost::find($id);
        $businesspost->title = $request->title;
        $businesspost->title_ar = $request->title_ar;
        $businesspost->slug = $request->slug;
        $businesspost->slug_ar = $request->slug_ar;
        $businesspost->description = $request->description;
        $businesspost->description_ar = $request->description_ar;
        $businesspost->selling_price = $request->selling_price;
        $businesspost->selling_price_ar = $request->selling_price_ar;
        $businesspost->address = $request->address;
        $businesspost->address_ar = $request->address_ar;
        $businesspost->business_category_id = $request->business_category_id;
        $businesspost->business_type_id = $request->business_type_id;
        $businesspost->business_status = $request->business_status;
        $businesspost->employee_number = $request->employee_number;
        $businesspost->annual_income = $request->annual_income;
        $businesspost->company_age = $request->company_age;
        $businesspost->status = 1;

        if ($request->hasFile('image')) {
            try {
                $old = $businesspost->image;
                $businesspost->image = fileUploader($request->image, getFilePath('business_image'), getFileSize('business_image'), $old);
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Couldn\'t upload your image'];
                return back()->withNotify($notify);
            }
        }

        $businesspost->save();

        $notify[] = ['success', 'Business Post Successfully Updated'];
        return to_route('admin.businesspost.index')->withNotify($notify);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BusinessPost $businessPost)
    {
        //
    }

  
}
