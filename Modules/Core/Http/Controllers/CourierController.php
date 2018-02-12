<?php

namespace Modules\Core\Http\Controllers;

use App\Models\Core\Courier;
use App\Models\Core\CourierType;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Core\Http\Requests\CourierRequest;

class CourierController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $couriers = Courier::paginate(10);

        return view('core::courier.index', compact('couriers'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $courierTypes = CourierType::all();

        return view('core::courier.create', compact('courierTypes'));
    }

    /**
     * Store a newly created resource in storage.
     * @param CourierRequest $request
     * @return Response
     */
    public function store(CourierRequest $request)
    {
        $courier = new Courier();
        $courier->fill([
            'name' => $request->name,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
        ]);
        $courier->courierType()->associate($request->courier_type_id);
        $courier->save();

        flash('Berhasil Menambahkan ' . $request->name)->success();

        return redirect(route('courier.index'));
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
        $courier = Courier::find($id);
        $courierTypes = CourierType::all();

        return view('core::courier.edit', compact('courierTypes', 'courier'));
    }

    /**
     * Update the specified resource in storage.
     * @param CourierRequest $request
     * @param $id
     * @return Response
     */
    public function update(CourierRequest $request, $id)
    {
        $courier = Courier::find($id);
        $courier->fill([
            'name' => $request->name,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
        ]);
        $courier->courierType()->associate($request->courier_type_id);
        $courier->save();

        flash('Berhasil memperbaharui ' . $request->name)->success();

        return redirect(route('courier.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}
