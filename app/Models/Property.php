<?php

namespace App\Models;

use App\Traits\LangDb;
use App\Constants\Status;
use App\Traits\Searchable;
use App\Models\PropertyType;
use App\Traits\GlobalStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Property extends Model
{
    use HasFactory, Searchable, GlobalStatus, LangDb;


    protected $guarded = [];


    protected $appends = ['thumb_image_url'];

    protected $thumb_image_url;

    public function getThumbImageUrlAttribute()
    {
        $this->thumb_image_url = getFilePath('property_thumb');
        return $this->thumb_image_url;
    }


    public function propertyType()
    {
        return $this->belongsTo(PropertyType::class, 'property_type_id');
    }

    public function subPropertyType()
    {
        return $this->belongsTo(SubpropertyType::class, 'subproperty_type_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,);
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function images()
    {
        return $this->hasMany(PropertyImage::class);
    }

    // public function scopeActive($query)
    // {
    //     return $query->where('status', Status::ACTIVE);
    // }

    public function scopePending($query)
    {
        return $query->where('status', Status::PENDING);
    }

    public function scopeReview($query)
    {
        return $query->where('status', Status::REVIEW);
    }

    public function scopeRejected($query)
    {
        return $query->where('status', Status::REJECT);
    }

    public function scopePublished($query)
    {
        return $query->where('status', Status::PUBLISHED);
    }

    public function statusBadge(): Attribute
    {
        return new Attribute(function () {
            $html = '';
            if ($this->status == Status::PENDING) {
                $html = '<span class="badge bg-primary">' . trans("Pending") . '</span>';
            } elseif ($this->status == Status::REVIEW) {
                $html = '<span class="badge bg-warning">' . trans("Review") . '</span>';
            } elseif ($this->status == Status::REJECT) {
                $html = '<span class="badge bg-danger">' . trans("Rejected") . '</span>';
            } elseif ($this->status == Status::PUBLISHED) {
                $html = '<span class="badge bg-success">' . trans("Published") . '</span>';
            }
            return $html;
        });
    }



    public function favorite(){
       return $this->hasOne(Favorite::class);
    }

    public function details(){
        return $this->hasMany(PropertyDetail::class);
     }

     public function biddings()
     {
         return $this->hasMany(Bidding::class);
     }



}
