<?php

namespace App\Services\Inventory;

use App\Models\Inventory\Product;

class ServiceAddQuantity extends AbstractServiceInventory
{
    public function availableStock()
    {
        if ($this->product()) {

            return $this->product()->quantity;
        }
    }

    public function addedStock()
    {
        $stocks = $this->request->quantity;
        if ($this->availableStock()) {
            $productStock = $this->availableStock() + $stocks;
            $product = Product::find($this->request->product_id);
            $product->quantity = $productStock;
            $product->save();

            return $productStock;
        }
    }
}