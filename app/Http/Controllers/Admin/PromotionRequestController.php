<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\PropertyRequest;
use App\Http\Controllers\Controller;
use App\Models\PromotionRequest;

class PromotionRequestController extends Controller
{
    public function index(){
        $promotionReq = PromotionRequest::searchable(['name','email','mobile'])->latest()->paginate(getPaginate());
        return view('admin.promotion_request.index', compact('promotionReq'));
    }

    public function show($id){
        $promotionReq  = PromotionRequest::find($id);
        return view('admin.promotion_request.show',compact('promotionReq'));
    }

    public function approve($id){
        $promotionReq  = PromotionRequest::find($id);
        $promotionReq->status = 1;
        $promotionReq->save();
        $notify[] = ['success', 'Promotion request approved successfully'];
        return back()->withNotify($notify);
    }
    
    public function reject($id){
        $promotionReq  = PromotionRequest::find($id);
        $promotionReq->status = 2;
        $promotionReq->save();
        $notify[] = ['success', 'Promotion request rejected successfully'];
        return back()->withNotify($notify);
    }

  
}
