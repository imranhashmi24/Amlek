<?php

namespace App\Http\Controllers\Admin\Request;

use App\Http\Controllers\Controller;
use App\Models\FloorPlanRequest;
use Illuminate\Http\Request;

class FloorPlanRequestController extends Controller
{
    public function index()
    {
        $serviceRequests = $this->serviceRequestData();
        return view('admin.request.floor_plan_request.index', compact('serviceRequests'));
    }

    public function pending()
    {
        $serviceRequests = $this->serviceRequestData('pending');
        return view('admin.request.floor_plan_request.index', compact('serviceRequests'));
    }

    public function accepted()
    {
        $serviceRequests = $this->serviceRequestData('accepted');
        return view('admin.request.floor_plan_request.index', compact('serviceRequests'));
    }

    public function rejected()
    {
        $serviceRequests = $this->serviceRequestData('rejected');
        return view('admin.request.floor_plan_request.index', compact('serviceRequests'));
    }

    protected function serviceRequestData($scope = null)
    {
        if ($scope) {
            $serviceRequests = FloorPlanRequest::$scope();
        } else {
            $serviceRequests = FloorPlanRequest::query();
        }
        return $serviceRequests->searchable(['name', 'country:name', 'city:name', 'email', 'mobile'])->latest()->paginate(getPaginate());
    }

    public function show($id)
    {
        $serviceRequest = FloorPlanRequest::findOrFail($id);
        return view('admin.request.floor_plan_request.show', compact('serviceRequest'));
    }

    public function status($id, $status)
    {
        $serviceRequest = FloorPlanRequest::findOrFail($id);
        $serviceRequest->status = $status;
        $serviceRequest->save();
        $notify[] = ['success', 'Change Status Successfully'];
        return back()->withNotify($notify);
    }
}
