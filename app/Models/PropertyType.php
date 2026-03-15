<?php

namespace App\Models;

use App\Traits\GlobalStatus;
use App\Traits\LangDb;
use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PropertyType extends Model
{
    use HasFactory, Searchable, LangDb, GlobalStatus;


    protected $appends = ['image_url'];

    protected $image_url;

    public function getImageUrlAttribute()
    {
        $this->image_url = getFilePath('propertyType');
        return $this->image_url;
    }

    public function property_type_cities()
    {
        return $this->hasMany(PropertyTypeArea::class);
    }


    public function subproperty_types()
    {
        return $this->hasMany(SubpropertyType::class);
    }
}
