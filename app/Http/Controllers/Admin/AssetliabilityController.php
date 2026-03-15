<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AssetliabilitieRequest;
use Illuminate\Http\Request;

class AssetliabilityController extends Controller
{
    public function index(){
        $asset_liability_req = AssetliabilitieRequest::searchable(['name','email','mobile'])->latest()->paginate(getPaginate());
        return view('admin.asset_liability.index', compact('asset_liability_req'));
    }

    public function show($id){
        $asset_liability_req  = AssetliabilitieRequest::find($id);
        return view('admin.asset_liability.show',compact('asset_liability_req'));
    }

    public function approve($id){
        $promotionReq  = AssetliabilitieRequest::find($id);
        $promotionReq->status = 1;
        $promotionReq->save();
        $notify[] = ['success', 'Asset liability request approved successfully'];
        return back()->withNotify($notify);
    }

    public function reject($id){
        $promotionReq  = AssetliabilitieRequest::find($id);
        $promotionReq->status = 2;
        $promotionReq->save();
        $notify[] = ['success', 'Asset liability request rejected successfully'];
        return back()->withNotify($notify);
    }

}
