<?php

namespace Modules\Inventory\Http\Controllers;

use App\Models\Inventory\Product;
use App\Services\ServicePaginator\ServicePaginator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

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
        return view('inventory::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
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
     * @return Response
     */
    public function edit()
    {
        return view('inventory::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}
