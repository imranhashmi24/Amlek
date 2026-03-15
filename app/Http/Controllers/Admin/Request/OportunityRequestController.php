<?php

namespace App\Http\Controllers\Admin\Request;

use Illuminate\Http\Request;
use App\Models\OportunityRequest;
use App\Http\Controllers\Controller;

class OportunityRequestController extends Controller
{
    public function index()
    {
        $serviceRequests = $this->serviceRequestData();
        return view('admin.request.oportunity_request.index', compact('serviceRequests'));
    }

    public function pending()
    {
        $serviceRequests = $this->serviceRequestData('pending');
        return view('admin.request.oportunity_request.index', compact('serviceRequests'));
    }

    public function accepted()
    {
        $serviceRequests = $this->serviceRequestData('accepted');
        return view('admin.request.oportunity_request.index', compact('serviceRequests'));
    }

    public function rejected()
    {
        $serviceRequests = $this->serviceRequestData('rejected');
        return view('admin.request.oportunity_request.index', compact('serviceRequests'));
    }

    protected function serviceRequestData($scope = null)
    {
        if ($scope) {
            $serviceRequests = OportunityRequest::$scope();
        } else {
            $serviceRequests = OportunityRequest::query();
        }
        return $serviceRequests->searchable(['title', 'mobile_number','email'])->latest()->paginate(getPaginate());
    }

    public function show($id)
    {
        $serviceRequest = OportunityRequest::findOrFail($id);
        return view('admin.request.oportunity_request.show', compact('serviceRequest'));
    }

    public function status($id, $status)
    {
        $serviceRequest = OportunityRequest::findOrFail($id);
        $serviceRequest->status = $status;
        $serviceRequest->save();
        $notify[] = ['success', 'Change Status Successfully'];
        return back()->withNotify($notify);
    }
}
