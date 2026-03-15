<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FinanceRequest;
use Illuminate\Http\Request;

class FinanceRequestController extends Controller
{
    public function index()
    {
        $financeRequests = $this->financeRequestData();
        return view('admin.finance_request.index', compact('financeRequests'));
    }

    public function pending()
    {
        $financeRequests = $this->financeRequestData('pending');
        return view('admin.finance_request.index', compact('financeRequests'));
    }

    public function accepted()
    {
        $financeRequests = $this->financeRequestData('accepted');
        return view('admin.finance_request.index', compact('financeRequests'));
    }

    public function rejected()
    {
        $financeRequests = $this->financeRequestData('rejected');
        return view('admin.finance_request.index', compact('financeRequests'));
    }

    protected function financeRequestData($scope = null)
    {
        if ($scope) {
            $financeRequests = FinanceRequest::$scope();
        } else {
            $financeRequests = FinanceRequest::query();
        }
        return $financeRequests->searchable(['name', 'country:name', 'city:name', 'propertyType:name', 'email', 'mobile'])->latest()->paginate(getPaginate());
    }

    public function show($id)
    {
        $financeRequest = FinanceRequest::findOrFail($id);
        return view('admin.finance_request.show', compact('financeRequest'));
    }

    public function status($id, $status)
    {
        $financeRequest = FinanceRequest::findOrFail($id);
        $financeRequest->status = $status;
        $financeRequest->save();
        $notify[] = ['success', 'Change Status Successfully'];
        return back()->withNotify($notify);
    }
}
