<?php

namespace App\Models;

use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Model;

class BusinessRequest extends Model
{
    use Searchable;


    public function businessPost()
    {
        return $this->belongsTo(BusinessPost::class, "business_post_id");
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function city(){
        return $this->belongsTo(City::class);
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
