<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Courier extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'address',
        'phone_number',
        'created_at',
        'updated_at',
    ];

    public function courierType()
    {
        return $this->belongsTo(CourierType::class);
    }
}
