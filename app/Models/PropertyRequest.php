<?php

namespace App\Models;

use App\Constants\Status;
use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class PropertyRequest extends Model
{
    use Searchable;

    protected $appends = ['image_url'];

    protected $image_url;

    public function getImageUrlAttribute()
    {
        $this->image_url = getFilePath('property_thumb');
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


    public function subPropertyType()
    {
        return $this->belongsTo(SubpropertyType::class, 'subproperty_type_id', 'id');
    }

    public function scopePending($query)
    {
        return $query->where('status', Status::PENDING);
    }

    public function scopeAccepted($query)
    {
        return $query->where('status', Status::ACCEPT);
    }

    public function scopeRejected($query)
    {
        return $query->where('status', Status::REJECT);
    }

    public function statusBadge(): Attribute
    {
        return new Attribute(function () {
            $html = '';
            if ($this->status == Status::PENDING) {
                $html = '<span class="badge bg-primary">' . trans("Pending") . '</span>';
            } elseif ($this->status == Status::APPROVED) {
                $html = '<span class="badge bg-success">' . trans("Approved") . '</span>';
            } elseif ($this->status == Status::REJECT) {
                $html = '<span class="badge bg-danger">' . trans("Rejected") . '</span>';
            }
            return $html;
        });
    }
}
