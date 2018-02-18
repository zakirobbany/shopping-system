<?php

namespace Modules\Core\Http\Controllers;

use App\Models\Core\Customer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Core\Http\Requests\CustomerRequest;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $customers = Customer::select(DB::raw("*"));
        if ($request->has('filter_name')) {
            $customers->where('name', 'like', '%' . $request->filter_name . '%');
        }
        $customers = $customers->paginate();

        return view('core::customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('core::customer.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(CustomerRequest $request)
    {
        Customer::create($request->all());

        flash('Berhasil Menambahkan ' . $request->name)->success();

        return redirect(route('customer.index'));
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
        $customer = Customer::find($id);
        return view('core::customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(CustomerRequest $request, $id)
    {
        $customer = Customer::find($id);
        $customer->fill([
            'name' => $request->name,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
        ]);
        $customer->save();

        flash('Berhasil Memperbaharui ' . $request->name)->success();

        return redirect(route('customer.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        Customer::find($id)->delete();

        flash('Berhasil dihapus')->warning();

        return redirect(route('customer.index'));
    }
}
