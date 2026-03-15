<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Page;
use App\Models\Country;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Models\PropertyImage;
use Carbon\Carbon;
use Exception;

class PropertyController extends Controller
{
    public function property(Request $request)
    {
        $query = Property::query();

        if ($request->filled('property_type')) {
            $query->where('property_type_id', $request->property_type);
        }

        if ($request->filled('city_id')) {
            $query->where('city_id', $request->city_id);
        }

        if ($request->filled('subproperty_type_id')) {
            $query->where('subproperty_type_id', $request->subproperty_type_id);
        }

        if ($request->filled('country_id')) {
            $query->where('country_id', $request->country_id);
        }

        if ($request->filled('purpose')) {
            $query->where('purpose', $request->purpose);
        }

        if ($request->filled('time_period') && $request->input('time_period') == "All") {
            // Do not apply any date filtering for "All"
        } elseif ($request->filled('time_period') && $request->input('time_period') == "Newest") {
            $query->whereBetween("created_at", [now()->subDays(7), now()]);
        }

        if($request->filled('from_price') && $request->filled('to_price')){
            $query->whereBetween("price", [$request->from_price, $request->to_price]);
        }


        $properties = $query->published()->with('favorite')->get();
        $sections = Page::where('slug', 'property')->first();

        $ocountries = Country::orderByRaw('ISNULL(sort_order), sort_order')->with('city')->get();
        $countries = sortOrder($ocountries);


        if ($request->filled('tab') && $request->tab == 'list') {
            return view('web.pages.property', compact('properties', 'sections', 'countries'));
        } else {
            $getCityLatLng = $this->getCityLatLng($request->city_id);

            $property_items = [];

            foreach($properties as $property){
                $property_items[] = [
                    'id'     => $property->id,
                    'slug'   => $property->slug,
                    'lat'    => $property->latitude,
                    'lng'    => $property->longitude,
                    'title'  => app()->getLocale() == 'en' ? $property->title : $property->title_ar,
                ];

            }

            return view('web.pages.property_map', compact('getCityLatLng','property_items', 'sections', 'countries'));
        }
    }

    public function getCityLatLng($city_id)
    {
        $city = City::find($city_id);
        if($city){
            return [
                'lat' => $city->lat,
                'lng' => $city->lng,
                'title' => app()->getLocale() == 'en' ? $city->name : $city->name_ar,
            ];
        }else{
            return [
                'lat' => '24.774265',
                'lng' => '46.738586',
                'title' => app()->getLocale() == 'en' ? 'Riyadh' : 'الرياض',
            ];
        }
    }

    public function propertyDetail($slug)
    {
        try{
            $property = Property::where('slug', $slug)->first();
            $propertyImages = PropertyImage::where('property_id', $property->id)->get();

            return view('web.pages.property_detail', compact('property','propertyImages'));
        }catch (Exception $e){
            return back();
        }
    }

}
