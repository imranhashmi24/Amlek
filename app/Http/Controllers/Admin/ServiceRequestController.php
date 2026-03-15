<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceRequest;

class ServiceRequestController extends Controller
{
    public function index()
    {
        $serviceRequests = $this->serviceRequestData();
        return view('admin.service_request.index', compact('serviceRequests'));
    }

    public function pending()
    {
        $serviceRequests = $this->serviceRequestData('pending');
        return view('admin.service_request.index', compact('serviceRequests'));
    }

    public function accepted()
    {
        $serviceRequests = $this->serviceRequestData('accepted');
        return view('admin.service_request.index', compact('serviceRequests'));
    }

    public function rejected()
    {
        $serviceRequests = $this->serviceRequestData('rejected');
        return view('admin.service_request.index', compact('serviceRequests'));
    }

    protected function serviceRequestData($scope = null)
    {
        if ($scope) {
            $serviceRequests = ServiceRequest::$scope();
        } else {
            $serviceRequests = ServiceRequest::query();
        }
        return $serviceRequests->searchable(['name', 'country:name', 'city:name', 'propertyType:name', 'email', 'mobile'])->latest()->paginate(getPaginate());
    }

    public function show($id)
    {
        $serviceRequest = ServiceRequest::findOrFail($id);
        return view('admin.service_request.show', compact('serviceRequest'));
    }

    public function status($id, $status)
    {
        $serviceRequest = ServiceRequest::findOrFail($id);
        $serviceRequest->status = $status;
        $serviceRequest->save();
        $notify[] = ['success', 'Change Status Successfully'];
        return back()->withNotify($notify);
    }

}
