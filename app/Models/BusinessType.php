<?php

namespace App\Models;

use App\Traits\LangDb;
use App\Traits\Searchable;
use App\Traits\GlobalStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BusinessType extends Model
{
    use HasFactory, Searchable, LangDb, GlobalStatus;
    protected $fillable = ['id', 'business_category_id', 'name', 'name_ar', 'status'];

    public function businesscategory()
    {
        return $this->belongsTo(BusinessCategory::class, 'business_category_id');
    }
}
