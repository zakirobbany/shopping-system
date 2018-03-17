<?php

namespace App\Models\Inventory;

use App\Models\Billing\Payment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'price',
        'quantity',
        'created_at',
        'updated_at',
    ];

    public function productBrand()
    {
        return $this->belongsTo(ProductBrand::class);
    }

    public function productType()
    {
        return $this->belongsTo(ProductType::class);
    }

    public function getQuantityTypeAttribute()
    {
        if ($this->productType->id == 1) {
            return $this->quantity . ' biji';
        }
        if ($this->productType->id == 2) {
            return $this->quantity . ' gram';
        }

        return $this->quantity;
    }

    public function getPriceCurrencyAttribute()
    {
        if ($this->productType->id == 1) {
            return number_format($this->price) . ' / biji';
        }
        if ($this->productType->id == 2) {
            return number_format($this->price) . ' / gram';
        }
        return number_format($this->price);
    }

    public function productStocks()
    {
        return $this->hasMany(ProductStock::class);
    }

    public function payments()
    {
        return $this->belongsToMany(Payment::class)
            ->withPivot('quantity', 'discount', 'total_price');
    }
}
