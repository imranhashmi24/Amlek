<?php

namespace App\Models;

use App\Traits\LangDb;
use App\Traits\Searchable;
use App\Traits\GlobalStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BusinessPost extends Model
{
    use HasFactory, Searchable, LangDb, GlobalStatus;

    protected $guarded = [];

    public function businesscategory()
    {
        return $this->belongsTo(BusinessCategory::class, "business_category_id");
    }

    public function businesstype()
    {
        return $this->belongsTo(BusinessType::class, "business_type_id");
    }
}
