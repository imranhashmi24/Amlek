<?php

namespace App\Models;

use App\Models\City;
use App\Models\Country;
use App\Constants\Status;
use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AuctionFormRequest extends Model
{
    use Searchable;

    public function auction()
    {
        return $this->belongsTo(Auction::class, 'auction_id', 'id');
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function city(){
        return $this->belongsTo(City::class);
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
