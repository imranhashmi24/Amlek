<?php

namespace App\Models;

use App\Traits\GlobalStatus;
use App\Traits\LangDb;
use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Model;
class PropertyTypeArea extends Model
{
    use Searchable, GlobalStatus, LangDb;


    protected $appends = ['image_url'];

    protected $image_url;

    public function getImageUrlAttribute()
    {
        $this->image_url = getFilePath('propertyTypeArea');
        return $this->image_url;
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function city(){
        return $this->belongsTo(City::class);
    }

    public function propertyType(){
        return $this->belongsTo(PropertyType::class);
    }
}
