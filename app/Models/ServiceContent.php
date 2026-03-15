<?php

namespace App\Models;

use App\Traits\GlobalStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Constants\Status;

class ServiceContent extends Model
{
    use HasFactory, GlobalStatus;
    protected $guarded = ['id'];

    public function scopeActive($query)
    {
        return $query->where('status', Status::ACTIVE);
    }
}
