<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Constants\Status;
use App\Traits\Searchable;

class AiService extends Model
{
    use Searchable;

    protected $guarded = [];


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
