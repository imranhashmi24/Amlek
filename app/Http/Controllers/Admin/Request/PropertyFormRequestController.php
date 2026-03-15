<?php

namespace App\Http\Controllers\Admin\Request;

use Illuminate\Http\Request;
use App\Models\PropertyFormRequest;
use App\Http\Controllers\Controller;

class PropertyFormRequestController extends Controller
{
    public function index()
    {
        $serviceRequests = $this->serviceRequestData();
        return view('admin.request.property_request.index', compact('serviceRequests'));
    }

    public function pending()
    {
        $serviceRequests = $this->serviceRequestData('pending');
        return view('admin.request.property_request.index', compact('serviceRequests'));
    }

    public function accepted()
    {
        $serviceRequests = $this->serviceRequestData('accepted');
        return view('admin.request.property_request.index', compact('serviceRequests'));
    }

    public function rejected()
    {
        $serviceRequests = $this->serviceRequestData('rejected');
        return view('admin.request.property_request.index', compact('serviceRequests'));
    }

    protected function serviceRequestData($scope = null)
    {
        if ($scope) {
            $serviceRequests = PropertyFormRequest::$scope();
        } else {
            $serviceRequests = PropertyFormRequest::query();
        }
        return $serviceRequests->searchable(['name', 'country:name', 'city:name', 'email', 'mobile'])->latest()->paginate(getPaginate());
    }

    public function show($id)
    {
        $serviceRequest = PropertyFormRequest::findOrFail($id);
        return view('admin.request.property_request.show', compact('serviceRequest'));
    }

    public function status($id, $status)
    {
        $serviceRequest = PropertyFormRequest::findOrFail($id);
        $serviceRequest->status = $status;
        $serviceRequest->save();
        $notify[] = ['success', 'Change Status Successfully'];
        return back()->withNotify($notify);
    }
}
