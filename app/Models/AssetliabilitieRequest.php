<?php

namespace App\Models;

use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetliabilitieRequest extends Model
{
    use HasFactory, Searchable;

    protected $guarded = ['id'];

    public function country(){
        return $this->belongsTo(Country::class, 'country_id', 'id')->withDefault();
    }

    public function city(){
        return $this->belongsTo(City::class, 'city_id', 'id')->withDefault();
    }

    public function getStatusBadgeAttribute()
    {
        $html = '';
        if ($this->status == 0) {
            $html = '<span class="badge bg-primary">' . trans('Pending') . '</span>';
        } elseIf($this->status == 1) {
            $html = '<span class="badge bg-success">' . trans('Accepted') . '</span>';
        }else{
            $html = '<span class="badge bg-danger">' . trans('Rejected') . '</span>';
        }
        return $html;
    }
}
