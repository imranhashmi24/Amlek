<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Auction;
use Illuminate\Http\Request;

class BiddingBoardController extends Controller
{
    public function show($id)
    {
        $auction = Auction::with('properties.property.biddings')->where('id', $id)->first();
        $title = __('Auction bidding for') . ' ' . (app()->getLocale() == 'en' ? $auction->title : $auction->title_ar);

        return view('admin.bidding_board.index', compact('auction', 'title'));
    }
}
