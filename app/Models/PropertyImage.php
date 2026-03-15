<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PropertyImage extends Model
{
    use HasFactory;

    protected $fillable = ['property_id', 'image'];

    protected $appends = ['imageUrl'];

    protected $imageUrl;

    public function getImageUrlAttribute()
    {
        $this->imageUrl = 'assets/admin/images/property/';
        return $this->imageUrl;
    }
}
