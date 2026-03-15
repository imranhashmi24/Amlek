<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BusinessCategory;
use Illuminate\Http\Request;

class BusinessCategoryController extends Controller
{
    public function index()
    {
        $businesscategories = BusinessCategory::searchable(['name', 'name_ar'])->paginate(getPaginate());
        return view('admin.businesscategories.index', compact('businesscategories'));
    }

    public function create()
    {
        return view('admin.businesscategories.create');
    }

    public function store(Request $request, $id = null)
    {

        $request->validate([
            'name' => 'required|string',
            'name_ar' => 'required|string'
        ]);

        if ($id) {
            $businessCategory = BusinessCategory::findOrFail($id);
            $message = 'Business Category update successfully';
        } else {
            $businessCategory = new BusinessCategory();
            $message = 'Business Category create successfully';
        }
        $businessCategory->name = $request->name;
        $businessCategory->name_ar = $request->name_ar;
        $businessCategory->save();

        $notify[] = ['success', $message];
        return to_route('admin.businesscategory.index')->withNotify($notify);
    }

    public function show(BusinessCategory $businessCategory)
    {
        //
    }

    public function edit($id)
    {
        $title = 'Edit Business Category';
        $businessCategory = BusinessCategory::findOrFail($id);
        return view('admin.businesscategories.create', compact('businessCategory', 'title'));
    }

    public function update(Request $request, BusinessCategory $businessCategory)
    {
        //
    }

    public function destroy(BusinessCategory $businessCategory)
    {
        //
    }

    public function status($id)
    {
        return BusinessCategory::changeStatus($id);
    }
}
