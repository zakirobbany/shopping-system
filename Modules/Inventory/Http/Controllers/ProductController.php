<?php

namespace Modules\Inventory\Http\Controllers;

use App\Models\Inventory\Product;
use App\Models\Inventory\ProductBrand;
use App\Models\Inventory\ProductStock;
use App\Models\Inventory\ProductType;
use App\Services\Inventory\ServiceAddQuantity;
use App\Services\ServicePaginator\ServicePaginator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Inventory\Http\Requests\ProductRequest;
use Modules\Inventory\Http\Requests\ProductStockRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $products = Product::all();
        if ($request->has('filter')) {
            if ($request->has('filter_name')) {
                $products = $products->filter(function ($product) use ($request){
                    return mb_strpos($product->name, $request->name) === true;
                });
            }
        }
        $option = [
            'path' => url('inventory/product'),
        ];
        $paginator = new ServicePaginator($products, 10, $request->page, $option);
        $products = $paginator->paginate();

        return view('inventory::product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $productBrands = ProductBrand::all();
        $productTypes = ProductType::all();

        return view('inventory::product.create', compact('productBrands', 'productTypes'));
    }

    /**
     * Store a newly created resource in storage.
     * @param ProductRequest $request
     * @return Response
     */
    public function store(ProductRequest $request)
    {
        $product = new Product();
        $product->fill([
            'name' => $request->name,
            'price' => $request->price,
        ]);
        $product->productBrand()->associate($request->product_brand_id);
        $product->productType()->associate($request->product_type_id);
        $product->save();

        flash('Berhasil Menambahkan Produk ' . $request->name)->success();

        return redirect()->route('product.index');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('inventory::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param $id
     * @return Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $productBrands = ProductBrand::all();
        $productTypes = ProductType::all();

        return view('inventory::product.edit', compact('product',
            'productTypes', 'productBrands'));
    }

    /**
     * Update the specified resource in storage.
     * @param ProductRequest $request
     * @param $id
     * @return Response
     */
    public function update(ProductRequest $request, $id)
    {
        $product = Product::find($id);
        $product->fill([
            'name' => $request->name,
            'price' => $request->price,
        ]);
        $product->productBrand()->associate($request->product_brand_id);
        $product->productType()->associate($request->product_type_id);
        $product->save();

        flash('Berhasil Memperbaharui Produk ' . $request->name)->success();

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     * @return response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        flash('Berhasil dihapus')->warning();

        return redirect()->route('product.index');
    }

    /**
     * Used to retrieve add stock blade view
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addStock()
    {
        $products = Product::all();

        return view('inventory::product.add-stock', compact('products'));
    }

    /**
     * @param ProductStockRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeAddStock(ProductStockRequest $request)
    {
        $productStock = new ProductStock();
        $serviceAddStock = new ServiceAddQuantity($request);
        $serviceAddStock->addedStock();
        $productStock->fill([
            'quantity' => $request->quantity,
        ]);
        $productStock->user()->associate(auth()->user()->id);
        $productStock->product()->associate($request->product_id);
        $productStock->save();

        flash('Stock Berhasil Ditambahkan')->success();

        return redirect()->route('product.index');
    }
}
