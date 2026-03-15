<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialInvestRequest;
use Illuminate\Http\Request;

class SocialInvestRequestController extends Controller
{
    public function index()
    {
        $serviceRequests = $this->serviceRequestData();
        return view('admin.social_service_request.index', compact('serviceRequests'));
    }

    public function pending()
    {
        $serviceRequests = $this->serviceRequestData('pending');
        return view('admin.social_service_request.index', compact('serviceRequests'));
    }

    public function accepted()
    {
        $serviceRequests = $this->serviceRequestData('accepted');
        return view('admin.social_service_request.index', compact('serviceRequests'));
    }

    public function rejected()
    {
        $serviceRequests = $this->serviceRequestData('rejected');
        return view('admin.social_service_request.index', compact('serviceRequests'));
    }

    protected function serviceRequestData($scope = null)
    {
        if ($scope) {
            $serviceRequests = SocialInvestRequest::$scope();
        } else {
            $serviceRequests = SocialInvestRequest::query();
        }
        return $serviceRequests->searchable(['name', 'country:name', 'city:name', 'propertyType:name', 'email', 'mobile'])->latest()->paginate(getPaginate());
    }

    public function show($id)
    {
        $serviceRequest = SocialInvestRequest::findOrFail($id);
        return view('admin.social_service_request.show', compact('serviceRequest'));
    }

    public function status($id, $status)
    {
        $serviceRequest = SocialInvestRequest::findOrFail($id);
        $serviceRequest->status = $status;
        $serviceRequest->save();
        $notify[] = ['success', 'Change Status Successfully'];
        return back()->withNotify($notify);
    }

}
