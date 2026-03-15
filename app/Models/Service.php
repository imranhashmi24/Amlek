<?php

namespace App\Models;

use App\Traits\Searchable;
use App\Traits\GlobalStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Constants\Status;


class Service extends Model
{
    use HasFactory, Searchable, GlobalStatus;

    protected $guarded = ['id'];


    public function contents()
    {
        return $this->hasMany(ServiceContent::class, 'service_id', 'id');
    }

    public function childrens()
    {
        return $this->hasMany(Service::class, 'parent_id', 'id');
    }

    public function scopeParent($query)
    {
        return $query->whereNot('type', 'section');
    }

    public function scopeActive($query)
    {
        return $query->where('status', Status::ACTIVE);
    }

    public function scopeContent($query, $type)
    {
        return $query->Active()
                ->where('type', $type)
                ->with('childrens.contents')
                ->where(function($query){
                    $query->Active();
                })
                ->first();
    }

}
