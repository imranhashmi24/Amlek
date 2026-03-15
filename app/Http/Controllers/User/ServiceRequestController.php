<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\FinanceRequest;
use App\Models\ServiceRequest;
use App\Models\PropertyRequest;
use App\Models\MarketingRequest;
use App\Http\Controllers\Controller;

class ServiceRequestController extends Controller
{
    public function propertyRequest(){
        $propertyRequests = PropertyRequest::where('user_id',auth()->user()->id)->paginate(getPaginate());
        return view('user.service_request.property', compact('propertyRequests'));
    }

    public function propertyRequestDetails($id){
        $propertyRequest = PropertyRequest::where('user_id',auth()->user()->id)->findOrFail($id);
        return view('user.service_request.property_details', compact('propertyRequest'));
    }

    public function financeRequest(){
        $financeRequests = FinanceRequest::where('user_id',auth()->user()->id)->paginate(getPaginate());
        return view('user.service_request.finance', compact('financeRequests'));
    }

    public function financeRequestDetails($id){
        $financeRequest = FinanceRequest::where('user_id',auth()->user()->id)->findOrFail($id);
        return view('user.service_request.finance_details', compact('financeRequest'));
    }

    public function marketingRequest(){
        $marketingRequests = MarketingRequest::where('user_id',auth()->user()->id)->paginate(getPaginate());
        return view('user.service_request.marketing', compact('marketingRequests'));
    }

    public function marketingRequestDetails($id){
        $marketingRequest = MarketingRequest::where('user_id',auth()->user()->id)->findOrFail($id);
        return view('user.service_request.marketing_details', compact('marketingRequest'));
    }

    public function serviceRequest(){
        $serviceRequests = ServiceRequest::where('user_id',auth()->user()->id)->paginate(getPaginate());
        return view('user.service_request.service', compact('serviceRequests'));
    }

    public function serviceRequestDetails($id){
        $serviceRequest = ServiceRequest::where('user_id',auth()->user()->id)->findOrFail($id);
        return view('user.service_request.service_details', compact('serviceRequest'));
    }
}
