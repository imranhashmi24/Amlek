<?php

namespace App\Models;

use App\Traits\LangDb;
use App\Traits\Searchable;
use App\Traits\GlobalStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubpropertyType extends Model
{
    use HasFactory, Searchable, LangDb, GlobalStatus;

    protected $fillable = [
        "property_type_id",
        "name",
        "name_ar",
        "image",
        "status"
    ];

    public function property_type()
    {
        return $this->belongsTo(PropertyType::class);
    }

}
