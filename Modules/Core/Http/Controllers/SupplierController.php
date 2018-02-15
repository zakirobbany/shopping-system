<?php

namespace Modules\Core\Http\Controllers;

use App\Models\Core\Supplier;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Core\Http\Requests\SupplierRequest;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $suppliers = Supplier::select(DB::raw("id, name, address, phone_number"));

        if ($request->has('filter_name')) {
            $suppliers->where('name', 'like', '%' . $request->filter_name . '%');
        }
        $suppliers = $suppliers->paginate();

        return view('core::supplier.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('core::supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param SupplierRequest $request
     * @return Response
     */
    public function store(SupplierRequest $request)
    {
        Supplier::create($request->all());

        flash('Berhasil Menambahkan ' . $request->name)->success();

        return redirect(route('supplier.index'));
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('core::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $supplier = Supplier::find($id);

        return view('core::supplier.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     * @param SupplierRequest $request
     * @param $id
     * @return Response
     */
    public function update(SupplierRequest $request, $id)
    {
        $supplier = Supplier::find($id);
        $supplier->fill([
            'name' => $request->name,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
        ]);
        $supplier->save();

        flash('Berhasil Memperbaharui ' . $request->name)->success();

        return redirect(route('supplier.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        Supplier::find($id)->delete();

        flash('Berhasil Dihapus')->success();

        return redirect(route('supplier.index'));
    }
}
