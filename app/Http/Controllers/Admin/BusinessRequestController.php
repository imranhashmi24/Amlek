<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\BusinessRequest;
use App\Http\Controllers\Controller;

class BusinessRequestController extends Controller
{
    public function index(){
        $businessReqs  = BusinessRequest::searchable(['name','email','mobile'])->latest()->paginate(getPaginate());
        return view('admin.business_request.index',compact('businessReqs'));
    }

    public function show($id){
        $businessReq  = BusinessRequest::find($id);
        return view('admin.business_request.show',compact('businessReq'));
    }

    public function approve($id){
        $businessReq  = BusinessRequest::find($id);
        $businessReq->status = 1;
        $businessReq->save();
        $notify[] = ['success', 'Business request approved successfully'];
        return back()->withNotify($notify);
    }
    
    public function reject($id){
        $businessReq  = BusinessRequest::find($id);
        $businessReq->status = 2;
        $businessReq->save();
        $notify[] = ['success', 'Business request rejected successfully'];
        return back()->withNotify($notify);
    }
}
