<?php

namespace App\Models;

use App\Traits\LangDb;
use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacilityService extends Model
{
    use HasFactory, LangDb, Searchable;

    protected $fillable = [
        'title',
        'title_ar',
        'description',
        'description_ar',
        'image',
        'status',
    ];

    public static array $searchable = [
        'title',
        'title_ar',
        'description',
        'description_ar',
    ];

    public function lists()
    {
        return $this->hasMany(FacilityServiceList::class, 'service_id', 'id');
    }


    public function forms()
    {
        return $this->hasMany(FacilityServiceForm::class, 'service_id', 'id');
    }
}
