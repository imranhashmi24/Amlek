<?php

namespace App\Traits;

use App\Models\Auction;
use App\Models\AuctionImage;
use App\Models\AuctionProject;
use Exception;
use Illuminate\Support\Facades\Auth;

trait AuctionTrait
{
    public function auctionData($scope = null)
    {
        if ($scope) {
            $properties = Auction::$scope();
        } else {
            $properties = Auction::query();
        }

        return $properties->searchable(['country:name', 'city:name'])->latest()->paginate(getPaginate());
    }

    public function storeAuction($auction, $request)
    {
        $auction->admin_id = Auth::guard('admin')->user()->id;
        $auction->title = $request->title;
        $auction->title_ar = $request->title_ar;
        $auction->slug = $request->slug;
        $auction->auction_day = $request->auction_day;
        $auction->auction_date = $request->auction_date;
        $auction->beginning_time = $request->beginning_time;
        $auction->country_id = $request->country_id;
        $auction->city_id = $request->city_id;
        $auction->latitude = $request->latitude;
        $auction->longitude = $request->longitude;
        $auction->address = $request->address;
        $auction->description = $request->description;
        $auction->description_ar = $request->description_ar;
        $auction->status = $request->status;
        $auction->starting_price = $request->starting_price;

        // New category-specific fields
        $auction->category_id = $request->category_id;

        // Car / Truck
        $auction->make = $request->make;
        $auction->make_ar = $request->make_ar;
        $auction->model = $request->model;
        $auction->model_ar = $request->model_ar;
        $auction->year = $request->year;
        $auction->mileage = $request->mileage;
        $auction->vin = $request->vin;
        $auction->title_status = $request->title_status;
        $auction->engine = $request->engine;
        $auction->drivetrain = $request->drivetrain;
        $auction->transmission = $request->transmission;
        $auction->body_style = $request->body_style;
        $auction->exterior_color = $request->exterior_color;
        $auction->interior_color = $request->interior_color;
        $auction->owner_count = $request->owner_count;
        $auction->seller_name = $request->seller_name;
        $auction->seller_type = $request->seller_type;
        $auction->highlights = $request->highlights;
        $auction->seller_notes = $request->seller_notes;
        $auction->other_items = $request->other_items;

        // Real Estate
        $auction->property_type = $request->property_type;
        $auction->bedrooms = $request->bedrooms;
        $auction->bathrooms = $request->bathrooms;
        $auction->sqft = $request->sqft;
        $auction->lot_size = $request->lot_size;
        $auction->year_built = $request->year_built;
        $auction->garage = $request->garage;
        $auction->re_features = $request->re_features;

        // Antiques
        $auction->era = $request->era;
        $auction->material = $request->material;
        $auction->dimensions = $request->dimensions;
        $auction->condition = $request->condition;
        $auction->provenance = $request->provenance;
        $auction->artist = $request->artist;
        $auction->antique_notes = $request->antique_notes;

        // Animals
        $auction->species = $request->species;
        $auction->breed = $request->breed;
        $auction->animal_age = $request->animal_age;
        $auction->gender = $request->gender;
        $auction->weight = $request->weight;
        $auction->health_records = $request->health_records;
        $auction->animal_info = $request->animal_info;

        // Fruits & Vegetables
        $auction->produce_type = $request->produce_type;
        $auction->variety = $request->variety;
        $auction->quantity = $request->quantity;
        $auction->harvest_date = $request->harvest_date;
        $auction->grade = $request->grade;
        $auction->produce_notes = $request->produce_notes;

        $auction->save();

        return $auction;
    }

    public function insertDocument($auction, $request)
    {
        if ($request->hasFile('document') && $request->file('document')->getClientOriginalExtension() === 'pdf') {
            $path = 'assets/documents/';
            $filename = $request->file('document')->getClientOriginalName() . '-' . time() . '.' . $request->file('document')->getClientOriginalExtension();
            $request->file('document')->move($path, $filename);
            if (!empty($auction->document)) {
                if (file_exists($auction->document)) {
                    unlink($auction->document);
                }
            }
            $auction->document = $path . $filename;
            $auction->save();
            return true;
        }
        return false;
    }

    public function insertImages($request, $storeAuction, $id = null)
    {
        $path = getFilePath('auction');
        if ($id) {
            $this->removeImages($request, $storeAuction, $path);
        }
        $hasImages = $request->file('images');
        if ($hasImages) {
            $size = getFileSize('property');
            $images = [];
            foreach ($hasImages as $file) {
                try {
                    $name = fileUploader($file, $path, $size, null);
                    $image = new AuctionImage();
                    $image->auction_id = $storeAuction->id;
                    $image->image = $name;
                    $images[] = $image;
                } catch (\Exception $exp) {
                    return false;
                }
            }
            $storeAuction->images()->saveMany($images);
        }
        return true;
    }

    public function removeImages($request, $storeAuction, $path)
    {
        $previousImages = $storeAuction->images->pluck('id')->toArray();
        $imageToRemove = array_values(array_diff($previousImages, $request->old ?? []));
        foreach ($imageToRemove as $item) {
            $auctionImage = AuctionImage::find($item);
            fileManager()->removeFile($path . '/' . $auctionImage->image);
            $auctionImage->delete();
        }
    }

    public function auctionProperty($auction, $request)
    {
        if ($request->property_ids) {
            foreach ($request->property_ids as $property_id) {
                $auctionProject = new AuctionProject();
                $auctionProject->auction_id = $auction->id;
                $auctionProject->property_id = $property_id;
                $auctionProject->save();
            }
        }
    }

    public function auctionPropertyUpdate($auction, $request)
    {
        if ($auction->properties) {
            foreach ($auction->properties as $property) {
                $property->delete();
            }
            $this->auctionProperty($auction, $request);
        }
    }
}
