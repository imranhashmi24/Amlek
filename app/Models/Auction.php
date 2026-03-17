<?php

namespace App\Models;

use App\Constants\Status;
use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Auction extends Model
{
    use HasFactory, Searchable;

    protected $guarded = ['id'];


    protected $appends = ['image_url'];

    protected $image_url;

    public function getImageUrlAttribute()
    {
        $this->image_url = getFilePath('auction_thumb');
        return $this->image_url;
    }



    public function create_by()
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }


    public function category()
    {
        return $this->belongsTo(AuctionCategory::class, 'category_id');
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
        return $this->hasMany(AuctionImage::class);
    }

    public function properties()
    {
        return $this->hasMany(AuctionProject::class);
    }


    public function biddings()
    {
        return $this->hasMany(Bidding::class);
    }


    public function scopeIfNotPending($query)
    {
        return $query->where('status', '!=', Status::PENDING);
    }


    public function scopePending($query)
    {
        return $query->where('status', Status::PENDING);
    }

    public function scopeCurrent($query)
    {
        return $query->where('status', Status::CURRENT);
    }

    public function scopeUpcoming($query)
    {
        return $query->where('status', Status::UPCOMING);
    }

    public function scopeFinished($query)
    {
        return $query->where('status', Status::FINISHED);
    }


    public function statusBadge(): Attribute
    {
        return new Attribute(function () {
            $html = '';
            if ($this->status == Status::PENDING) {
                $html = '<span class="badge bg-primary">' . trans("Pending") . '</span>';
            } elseif ($this->status == Status::CURRENT) {
                $html = '<span class="badge bg-warning">' . trans("Current") . '</span>';
            } elseif ($this->status == Status::UPCOMING) {
                $html = '<span class="badge bg-info">' . trans("Upcoming") . '</span>';
            } elseif ($this->status == Status::FINISHED) {
                $html = '<span class="badge bg-success">' . trans("Finished") . '</span>';
            }
            return $html;
        });
    }
}
