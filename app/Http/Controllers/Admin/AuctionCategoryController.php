<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AuctionCategory;
use App\Rules\FileTypeValidate;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

// Ensure the deleteFile helper function is available
// If deleteFile is a helper function, it should be auto-loaded via composer.json
// Otherwise, create it in your helpers file or replace with: Storage::disk('public')->delete(...)

class AuctionCategoryController extends Controller
{
    // list of categories
    public function index(Request $request)
    {
        $auctionCategories = AuctionCategory::latest()->paginate(10);
        return view('admin.auction_categories.index', compact('auctionCategories'));
    }

    public function create()
    {
        $title = 'Create Auction Category';
        return view('admin.auction_categories.create', compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:190',
            'name_ar' => 'required|string|max:190',
            'image'   => ['nullable', 'image', new FileTypeValidate(['jpg', 'jpeg', 'png'])],
            'status'  => 'required|boolean',
        ]);

        $auctionCategory = new AuctionCategory();
        $auctionCategory->name = $request->name;
        $auctionCategory->name_ar = $request->name_ar;
        $auctionCategory->slug = Str::slug($request->name) . rand(1000, 9999);
        $auctionCategory->status = $request->status;

        if ($request->hasFile('image')) {
            try {
                $old = $auctionCategory->image;
                $auctionCategory->image = fileUploader($request->image, getFilePath('all_category'), getFileSize('all_category'), $old);
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Couldn\'t upload your image'];
                return back()->withNotify($notify);
            }
        }

        $auctionCategory->save();
        $notify[] = ['success', 'Category created successfully'];
        return back()->withNotify($notify);
    }

    public function edit($id)
    {
        $auctionCategory = AuctionCategory::findOrFail($id);
        return view('admin.auction_categories.edit', compact('auctionCategory'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name'    => 'required|string|unique:auction_categories,name,' . $id,
            'name_ar' => 'required|string|unique:auction_categories,name_ar,' . $id,
            'image'   => ['nullable', 'image', new FileTypeValidate(['jpg', 'jpeg', 'png'])],
            'status'  => 'required|boolean',
        ]);


        $auctionCategory = AuctionCategory::findOrFail($id);
        $auctionCategory->name = $request->name;
        $auctionCategory->name_ar = $request->name_ar;
        $auctionCategory->slug = Str::slug($request->name) . rand(1000,9999);
        $auctionCategory->status = $request->status;

        if ($request->hasFile('image')) {
            try {
                $old = $auctionCategory->image;
                $auctionCategory->image = fileUploader($request->image, getFilePath('all_category'), getFileSize('all_category'), $old);
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Couldn\'t upload your image'];
                return back()->withNotify($notify);
            }
        }

        $auctionCategory->save();
        $notify[] = ['success', 'Category updated successfully'];
        return back()->withNotify($notify);
    }

    public function show($id)
    {
        $auctionCategory = AuctionCategory::findOrFail($id);
        return view('admin.auction_categories.show', compact('auctionCategory'));
    }

    public function destroy($id)
    {
        $auctionCategory = AuctionCategory::findOrFail($id);

        if ($auctionCategory->image != null) {
            deleteFile(getFilePath('all_category') . '/' . $auctionCategory->image);
        }

        $auctionCategory->delete();
        $notify[] = ['success', 'Category deleted successfully'];
        return back()->withNotify($notify);
    }
}
