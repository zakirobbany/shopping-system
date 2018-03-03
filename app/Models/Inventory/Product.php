<?php

namespace App\Models\Inventory;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'price',
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
}
