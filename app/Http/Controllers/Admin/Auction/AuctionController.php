<?php

namespace App\Http\Controllers\Admin\Auction;

use Exception;
use App\Models\Auction;
use App\Models\Country;
use App\Models\Property;
use App\Traits\AuctionTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auction\AuctionRequest;
use App\Models\AuctionImage;

class AuctionController extends Controller
{
    use AuctionTrait;

    public function index(Request $request)
    {
        $auctions = $this->auctionData();

        return view('admin.auction.index', compact('auctions'));
    }

    public function pending()
    {
        $auctions = $this->auctionData('pending');
        return view('admin.auction.index', compact('auctions'));
    }

    public function finished()
    {
        $auctions = $this->auctionData('finished');
        return view('admin.auction.index', compact('auctions'));
    }

    public function upcoming()
    {
        $auctions = $this->auctionData('upcoming');
        return view('admin.auction.index', compact('auctions'));
    }

    public function current()
    {
        $auctions = $this->auctionData('current');
        return view('admin.auction.index', compact('auctions'));
    }


    public function create()
    {
        $short_countries = Country::orderByRaw('ISNULL(sort_order), sort_order')->with('city')->get();
        $countries = sortOrder($short_countries);
        $properties = Property::published()->select(['id','title', 'title_ar'])->get();
        return view('admin.auction.create', compact( 'countries','properties'));
    }


    public function store(AuctionRequest $request)
    {
        try {

            $auction = new Auction();
            $storeAuction = $this->storeAuction($auction, $request);

            if ($storeAuction && $request->hasFile('thumb_image')) {
                try {
                    $old = $storeAuction->thumb_image;
                    $storeAuction->thumb_image = fileUploader($request->thumb_image, getFilePath('auction_thumb'), getFileSize('auction_thumb'), $old);
                    $storeAuction->save();
                } catch (\Exception $e) {
                    $message = __('Couldn\'t upload your image');
                    return $this->redirectNotify('error', $message, 'admin.auction.index');
                }
            }


            if($storeAuction){
                $image = $this->insertImages($request, $storeAuction, $id = 0);

                if (!$image) {
                    return response()->json([
                        'status' => 'error',
                        'message' => __("Couldn\'t upload account listing images"),

                    ]);
                }

                $this->auctionProperty($storeAuction, $request);
            }


            $message = __('Auction create successfully');
            return $this->redirectNotify('success', $message, 'admin.auction.index');

        } catch (Exception $e) {
            $message = __('Something went wrong!');
            return $this->redirectNotify('error', $message, 'admin.auction.index');
        }
    }


    public function status($id, $status)
    {
        $property = Property::findOrFail($id);
        $property->status = $status;
        $property->save();
        $notify[] = ['success', __('Change Status Successfully')];
        return back()->withNotify($notify);

    }

    public function edit($id)
    {
        $auction = Auction::findOrFail($id);
        $short_countries = Country::orderByRaw('ISNULL(sort_order), sort_order')->with('city')->get();
        $countries = sortOrder($short_countries);
        $properties = Property::published()->select(['id','title', 'title_ar'])->get();
        $images = [];

        foreach ($auction->images as $key => $image) {
            $img['id'] = $image->id;
            $img['src'] = getImage(getFilePath('auction') . '/' . $image->image);
            $images[] = $img;
        }

        $auction_properties = [];

        foreach ($auction->properties as $key => $property) {
            $pro['property_id'] = $property->property_id;
            $auction_properties[] = $pro;
        }



        return view('admin.auction.edit', compact('auction', 'countries', 'images', 'auction_properties', 'properties'));
    }

    public function update(AuctionRequest $request, $id)
    {

        try {
            $auction = Auction::find($id);

            $storeAuction = $this->storeAuction($auction, $request);

            if ($storeAuction && $request->hasFile('thumb_image')) {
                try {
                    $old = $storeAuction->thumb_image;
                    $storeAuction->thumb_image = fileUploader($request->thumb_image, getFilePath('auction_thumb'), getFileSize('auction_thumb'), $old);
                    $storeAuction->save();
                } catch (\Exception $e) {
                    $message = __('Couldn\'t upload your image');
                    return $this->redirectNotify('error', $message, 'admin.auction.index');
                }
            }


            if($storeAuction){
                $image = $this->insertImages($request, $storeAuction, $id = 0);

                if (!$image) {
                    return response()->json([
                        'status' => 'error',
                        'message' => __("Couldn\'t upload account listing images"),

                    ]);
                }

                $this->auctionProperty($storeAuction, $request);
            }


            $message = __('Auction update successfully');
            return $this->redirectNotify('success', $message, 'admin.auction.index');

        } catch (Exception $e) {
            $message = __('Something went wrong!');
            return $this->redirectNotify('error', $message, 'admin.auction.index');
        }
    }

    public function show($id)
    {
        $auction = Auction::with('country','city','properties')->findOrFail($id);
        $auctionImages = AuctionImage::where('auction_id', $auction->id)->get();
        return view('admin.auction.show', compact('auction', 'auctionImages'));
    }

}
