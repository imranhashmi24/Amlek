<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BusinessCategory;
use App\Models\BusinessType;
use Illuminate\Http\Request;

class BusinessTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $BusinessTypes = BusinessType::searchable(['name', 'name_ar', 'business_category_id'])->paginate(getPaginate());
        return view('admin.businesstypes.index', compact('BusinessTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Create Business Type';
        $businessCategories = BusinessCategory::get();
        return view('admin.businesstypes.create', compact('title', 'businessCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id = null)
    {
        $validation = 'required';

        if ($id) {
            $validation = 'nullable';
        }

        $request->validate([
            'name' => 'required|string',
            'name_ar' => 'required|string',
            'business_category_id' => 'required|string',
        ]);

        if ($id) {
            $BusinessType = BusinessType::findOrFail($id);
            $message = 'Business Type update successfully';
        } else {
            $BusinessType = new BusinessType();
            $message = 'Business Type create successfully';
        }

        $BusinessType->name = $request->name;
        $BusinessType->name_ar = $request->name_ar;
        $BusinessType->business_category_id = $request->business_category_id;
        $BusinessType->status = 1;
        $BusinessType->save();

        $notify[] = ['success', $message];
        return to_route('admin.businesstype.index')->withNotify($notify);
    }

    /**
     * Display the specified resource.
     */
    public function show(BusinessType $businessType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $title = 'Edit Business Type';
        $businessType = BusinessType::findOrFail($id);
        $businessCategories = BusinessCategory::get();
        return view('admin.businesstypes.create', compact('businessType', 'title', 'businessCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BusinessType $businessType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BusinessType $businessType)
    {
        //
    }
}
