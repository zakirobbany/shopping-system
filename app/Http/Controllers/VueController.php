<?php

namespace App\Http\Controllers;

use App\Models\Core\Customer;
use App\Models\Inventory\Product;
use Illuminate\Http\Request;

class VueController extends Controller
{
    public function getCustomers()
    {
        return [
            'data' => Customer::orderBy('name', 'asc')->get(),
        ];
    }

    public function getProducts()
    {
        return [
            'data' => Product::orderBy('name', 'asc')->get(),
        ];
    }

    public function getProductPrice($id)
    {
        $productPrice = Product::find($id)->sell_price;

        return [
            'data' => $productPrice,
        ];
    }

    public function getProductType($id)
    {
        $productType = Product::find($id)->productType->name;

        return [
            'data' => $productType,
        ];
    }
}
