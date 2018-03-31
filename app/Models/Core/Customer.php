<?php

namespace App\Models\Core;

use App\Models\Billing\Payment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'address',
        'phone_number',
        'created_at',
        'updated_at',
    ];

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

}
