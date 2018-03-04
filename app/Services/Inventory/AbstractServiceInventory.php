<?php

namespace App\Services\Inventory;

use App\Models\Inventory\Product;
use Illuminate\Http\Request;

abstract class AbstractServiceInventory
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function product()
    {
        if ($this->request->has('product_id')) {
            $product = Product::find($this->request->product_id);

            return $product;
        }
    }
}