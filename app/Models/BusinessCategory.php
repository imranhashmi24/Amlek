<?php

namespace App\Models;

use App\Traits\LangDb;
use App\Traits\Searchable;
use App\Traits\GlobalStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BusinessCategory extends Model
{
    use HasFactory, Searchable, LangDb, GlobalStatus;

    protected $fillable = ['id', 'name', 'name_ar', 'status'];


    public function businesstypes()
    {
        return $this->hasMany(BusinessType::class, 'business_category_id');
    }
}
