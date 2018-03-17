<?php

namespace App\Models\Billing;

use App\Models\Core\Customer;
use App\Models\Inventory\Product;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'date',
        'total_payment',
        'quantity',
        'total_price',
        'discount',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)
            ->withPivot('quantity', 'total_price', 'discount')
            ->withTimestamps();
    }
}
