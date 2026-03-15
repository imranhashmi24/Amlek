<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PropertyRequestSend;
use Illuminate\Http\Request;

class PropertyRequestSendController extends Controller
{
    public function index()
    {
        $propertyRequestSends = $this->propertyRequestSendData();
        return view('admin.service_request_send.index', compact('propertyRequestSends'));
    }

    public function pending()
    {
        $propertyRequestSends = $this->propertyRequestSendData('pending');
        return view('admin.service_request_send.index', compact('propertyRequestSends'));
    }

    public function accepted()
    {
        $propertyRequestSends = $this->propertyRequestSendData('accepted');
        return view('admin.service_request_send.index', compact('propertyRequestSends'));
    }

    public function rejected()
    {
        $propertyRequestSends = $this->propertyRequestSendData('rejected');
        return view('admin.service_request_send.index', compact('propertyRequestSends'));
    }

    protected function propertyRequestSendData($scope = null)
    {
        if ($scope) {
            $propertyRequestSend = PropertyRequestSend::$scope();
        } else {
            $propertyRequestSend = PropertyRequestSend::query();
        }

        return $propertyRequestSend->searchable(['name','email', 'mobile'])->latest()->paginate(getPaginate());
    }

    public function show($id)
    {
        $propertyRequestSend = PropertyRequestSend::findOrFail($id);
        return view('admin.service_request_send.show', compact('propertyRequestSend'));
    }

    public function status($id, $status)
    {
        $propertyRequestSend = PropertyRequestSend::findOrFail($id);
        $propertyRequestSend->status = $status;
        $propertyRequestSend->save();
        $notify[] = ['success', 'Change Status Successfully'];
        return back()->withNotify($notify);
    }
}
