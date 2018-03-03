<?php

namespace Modules\Inventory\Http\Controllers;

use App\Models\Inventory\ProductType;
use App\Services\ServicePaginator\ServicePaginator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $productTypes = ProductType::all();
        if ($request->has('filter')) {
            if ($request->has('filter_name')) {
                $productTypes = $productTypes->filter(function ($productType) use ($request) {
                    return mb_strpos($productType->name, $request->filter_name) === true;
                });
            }
        }
        $option = [
            'path' => url('inventory/product-type'),
        ];
        $paginator = new ServicePaginator($productTypes, 10, $request->page, $option);
        $productTypes = $paginator->paginate();

        return view('inventory::product-type.index', compact('productTypes'));
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
