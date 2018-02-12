<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourierType extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'created_at',
        'updated_at',
    ];

    public function couriers()
    {
        return $this->hasMany(Courier::class);
    }
}
