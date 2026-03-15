<?php

namespace App\Http\Controllers\Admin\Request;

use App\Http\Controllers\Controller;
use App\Models\AiService;
use Illuminate\Http\Request;

class AiServiceController extends Controller
{
    public function index()
    {
        $serviceRequests = $this->serviceRequestData();
        return view('admin.request.ai_service.index', compact('serviceRequests'));
    }

    public function pending()
    {
        $serviceRequests = $this->serviceRequestData('pending');
        return view('admin.request.ai_service.index', compact('serviceRequests'));
    }

    public function accepted()
    {
        $serviceRequests = $this->serviceRequestData('accepted');
        return view('admin.request.ai_service.index', compact('serviceRequests'));
    }

    public function rejected()
    {
        $serviceRequests = $this->serviceRequestData('rejected');
        return view('admin.request.ai_service.index', compact('serviceRequests'));
    }

    protected function serviceRequestData($scope = null)
    {
        if ($scope) {
            $serviceRequests = AiService::$scope();
        } else {
            $serviceRequests = AiService::query();
        }
        return $serviceRequests->searchable(['sp_name', 'fp_name'])->latest()->paginate(getPaginate());
    }

    public function show($id)
    {
        $serviceRequest = AiService::findOrFail($id);
        return view('admin.request.ai_service.show', compact('serviceRequest'));
    }

    public function status($id, $status)
    {
        $serviceRequest = AiService::findOrFail($id);
        $serviceRequest->status = $status;
        $serviceRequest->save();
        $notify[] = ['success', 'Change Status Successfully'];
        return back()->withNotify($notify);
    }
}
