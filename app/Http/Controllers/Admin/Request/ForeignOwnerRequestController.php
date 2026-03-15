<?php

namespace App\Http\Controllers\Admin\Request;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ForeignOwnershipRequest;

class ForeignOwnerRequestController extends Controller
{

    public function index()
    {
        $serviceRequests = $this->serviceRequestData();
        return view('admin.request.foreign_request.index', compact('serviceRequests'));
    }

    public function pending()
    {
        $serviceRequests = $this->serviceRequestData('pending');
        return view('admin.request.foreign_request.index', compact('serviceRequests'));
    }

    public function accepted()
    {
        $serviceRequests = $this->serviceRequestData('accepted');
        return view('admin.request.foreign_request.index', compact('serviceRequests'));
    }

    public function rejected()
    {
        $serviceRequests = $this->serviceRequestData('rejected');
        return view('admin.request.foreign_request.index', compact('serviceRequests'));
    }

    protected function serviceRequestData($scope = null)
    {
        if ($scope) {
            $serviceRequests = ForeignOwnershipRequest::$scope();
        } else {
            $serviceRequests = ForeignOwnershipRequest::query();
        }
        return $serviceRequests->searchable(['full_name', 'country:name', 'city:name', 'email', 'mobile_number'])->latest()->paginate(getPaginate());
    }

    public function show($id)
    {
        $serviceRequest = ForeignOwnershipRequest::findOrFail($id);
        return view('admin.request.foreign_request.show', compact('serviceRequest'));
    }

    public function status($id, $status)
    {
        $serviceRequest = ForeignOwnershipRequest::findOrFail($id);
        $serviceRequest->status = $status;
        $serviceRequest->save();
        $notify[] = ['success', 'Change Status Successfully'];
        return back()->withNotify($notify);
    }
}
