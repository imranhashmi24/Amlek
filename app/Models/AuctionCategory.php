<?php

namespace App\Models;

use App\Traits\LangDb;
use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuctionCategory extends Model
{
    use HasFactory, Searchable, LangDb;

    protected $guarded = [];


    public function auctions()
    {
        return $this->hasMany(Auction::class, 'category_id', 'id');
    }
}
