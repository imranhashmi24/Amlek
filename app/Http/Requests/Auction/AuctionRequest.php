<?php

namespace App\Http\Requests\Auction;

use App\Rules\FileTypeValidate;
use Illuminate\Foundation\Http\FormRequest;

class AuctionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('id');
        $validation = 'required';
        if ($id) {
            $validation = 'nullable';
        }

        return [
            // Existing required fields
            'title'              => 'required|string|max:191',
            'title_ar'           => 'required|string|max:191',
            'slug'               => 'required|unique:auctions,slug,' . $id,
            'auction_day'        => 'required',
            'auction_date'       => 'required|date',
            'beginning_time'     => 'required|date_format:Y-m-d\TH:i',
            'country_id'         => 'required|exists:countries,id',
            'city_id'            => 'required|exists:cities,id',
            'latitude'           => 'required|numeric',
            'longitude'          => 'required|numeric',
            'description'        => 'required',
            'description_ar'     => 'required',
            'status'             => 'required|in:0,1,2,3',
            'starting_price'     => 'required|numeric',
            'document'           => 'nullable|mimes:pdf',
            'thumb_image'        => [$validation, 'image', new FileTypeValidate(['jpg', 'jpeg', 'png'])],
            'images'             => 'nullable|array',
            'images.*'           => ['image', new FileTypeValidate(['jpg', 'jpeg', 'png'])],

            // New category-specific fields (all nullable)
            'category_id'        => 'required|exists:categories,id',

            // Car / Truck
            'make'               => 'nullable|string|max:191',
            'make_ar'            => 'nullable|string|max:191',
            'model'              => 'nullable|string|max:191',
            'model_ar'           => 'nullable|string|max:191',
            'year'               => 'nullable|integer|min:1900|max:2099',
            'mileage'            => 'nullable|integer|min:0',
            'vin'                => 'nullable|string|max:50',
            'title_status'       => 'nullable|string|max:100',
            'engine'             => 'nullable|string|max:100',
            'drivetrain'         => 'nullable|string|max:100',
            'transmission'       => 'nullable|string|max:100',
            'body_style'         => 'nullable|string|max:100',
            'exterior_color'     => 'nullable|string|max:100',
            'interior_color'     => 'nullable|string|max:100',
            'owner_count'        => 'nullable|string|max:50',
            'seller_name'        => 'nullable|string|max:191',
            'seller_type'        => 'nullable|string|in:Private Party,Dealer',
            'highlights'         => 'nullable|string',
            'seller_notes'       => 'nullable|string',
            'other_items'        => 'nullable|string',

            // Real Estate
            'property_type'      => 'nullable|string|max:100',
            'bedrooms'           => 'nullable|integer|min:0',
            'bathrooms'          => 'nullable|numeric|min:0',
            'sqft'               => 'nullable|integer|min:0',
            'lot_size'           => 'nullable|string|max:100',
            'year_built'         => 'nullable|integer|min:1800|max:2099',
            'garage'             => 'nullable|integer|min:0',
            're_features'        => 'nullable|string',

            // Antiques
            'era'                => 'nullable|string|max:100',
            'material'           => 'nullable|string|max:100',
            'dimensions'         => 'nullable|string|max:100',
            'condition'          => 'nullable|string|max:50',
            'provenance'         => 'nullable|string|max:191',
            'artist'             => 'nullable|string|max:191',
            'antique_notes'      => 'nullable|string',

            // Animals
            'species'            => 'nullable|string|max:100',
            'breed'              => 'nullable|string|max:100',
            'animal_age'         => 'nullable|string|max:50',
            'gender'             => 'nullable|string|in:Male,Female',
            'weight'             => 'nullable|string|max:50',
            'health_records'     => 'nullable|string|max:191',
            'animal_info'        => 'nullable|string',

            // Fruits & Vegetables
            'produce_type'       => 'nullable|string|max:100',
            'variety'            => 'nullable|string|max:100',
            'quantity'           => 'nullable|string|max:100',
            'harvest_date'       => 'nullable|date',
            'grade'              => 'nullable|string|max:100',
            'produce_notes'      => 'nullable|string',
        ];
    }
}
