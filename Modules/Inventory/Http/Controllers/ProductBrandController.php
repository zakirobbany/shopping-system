<?php

namespace Modules\Inventory\Http\Controllers;

use App\Models\Inventory\ProductBrand;
use App\Services\ServicePaginator\ServicePaginator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Inventory\Http\Requests\ProductBrandRequest;

class ProductBrandController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $productBrands = ProductBrand::all();
        if ($request->has('filter')) {
            if ($request->has('filter_name')) {
                $productBrands = $productBrands->filter(function ($productBrand) use ($request) {
                    return mb_strpos($productBrand->name, $request->filter_name) === true;
                });
            }
        }
        $option = [
            'path' => url('inventory/product-brand'),
        ];
        $paginator = new ServicePaginator(10, $request->page, $option);
        $productBrands = $paginator->paginate($productBrands);

        return view('inventory::product-brand.index', compact('productBrands'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('inventory::product-brand.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param ProductBrandRequest $request
     * @return Response
     */
    public function store(ProductBrandRequest $request)
    {
        ProductBrand::create($request->all());
        flash('Berhasil Menambahkan ' . $request->name)->success();

        return redirect(route('product-brand.index'));
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
    public function edit($id)
    {
        $productBrand = ProductBrand::find($id);

        return view('inventory::product-brand.edit', compact('productBrand'));
    }

    /**
     * Update the specified resource in storage.
     * @param ProductBrandRequest $request
     * @param $id
     * @return Response
     */
    public function update(ProductBrandRequest $request, $id)
    {
        $productBrand = ProductBrand::find($id);
        $productBrand->fill([
            'name' => $request->name,
        ]);
        $productBrand->save();
        flash('Berhasil Memperbaharui ' . $request->name)->success();

        return redirect(route('product-brand.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        ProductBrand::find($id)->delete();
        flash('Berhasil Dihapus')->warning();

        return redirect(route('product-brand.index'));
    }
}
