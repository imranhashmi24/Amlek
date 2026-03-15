<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\PropertyRequest;
use App\Http\Controllers\Controller;

class PropertyRequestController extends Controller
{
    public function index()
    {
        $propertyRequests = $this->propertyRequestData();
        return view('admin.property_request.index', compact('propertyRequests'));
    }

    public function pending()
    {
        $propertyRequests = $this->propertyRequestData('pending');
        return view('admin.property_request.index', compact('propertyRequests'));
    }

    public function accepted()
    {
        $propertyRequests = $this->propertyRequestData('accepted');
        return view('admin.property_request.index', compact('propertyRequests'));
    }

    public function rejected()
    {
        $propertyRequests = $this->propertyRequestData('rejected');
        return view('admin.property_request.index', compact('propertyRequests'));
    }

    protected function propertyRequestData($scope = null)
    {
        if ($scope) {
            $propertyRequests = PropertyRequest::$scope();
        } else {
            $propertyRequests = PropertyRequest::query();
        }
        return $propertyRequests->searchable(['name', 'country:name', 'city:name', 'propertyType:name', 'subPropertyType:name', 'email', 'mobile'])->latest()->paginate(getPaginate());
    }

    public function show($id)
    {
        $propertyRequest = PropertyRequest::findOrFail($id);
        return view('admin.property_request.show', compact('propertyRequest'));
    }

    public function status($id, $status)
    {
        $propertyRequest = PropertyRequest::findOrFail($id);
        $propertyRequest->status = $status;
        $propertyRequest->save();
        $notify[] = ['success', 'Change Status Successfully'];
        return back()->withNotify($notify);
    }
}
