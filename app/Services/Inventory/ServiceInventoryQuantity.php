<?php

namespace App\Services\Inventory;

use App\Models\Inventory\Product;

class ServiceInventoryQuantity extends AbstractServiceInventory
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

    public function subStock()
    {
        foreach ($this->request->product_id as $key => $productId) {
            if ($productId) {
                $product = Product::find($productId);
                $product->quantity = ($product->quantity - $this->request->quantity[$key]);

                $product->save();
            }
        }
    }
}