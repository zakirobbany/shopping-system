<?php

namespace Modules\Core\Http\Controllers;

use App\Models\Core\CourierType;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Core\Http\Requests\CourierTypeRequest;

class CourierTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $courierTypes = CourierType::all();
        if ($request->has('filter_name')) {
            $courierTypes = $courierTypes->whereIn('name', [$request->filter_name]);
        }

        return view('core::courier-type.index', compact('courierTypes'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('core::courier-type.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param CourierTypeRequest $request
     * @return Response
     */
    public function store(CourierTypeRequest $request)
    {
        CourierType::create($request->all());
        flash('Berhasil Menambahkan ' . $request->name)->success();

        return redirect(route('courier-type.index'));
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
        $courierType = CourierType::find($id);

        return view('core::courier-type.edit', compact('courierType'));
    }

    /**
     * Update the specified resource in storage.
     * @param CourierTypeRequest $request
     * @param $id
     * @return Response
     */
    public function update(CourierTypeRequest $request, $id)
    {
        $courierType = CourierType::find($id);
        $courierType->fill([
            'name' => $request->name,
        ]);
        $courierType->save();

        flash('Berhasil Memperbaharui ' . $request->name)->success();

        return redirect(route('courier-type.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        CourierType::find($id)->delete();
        flash('Berhasil Dihapus')->warning();

        return redirect(route('courier-type.index'));
    }
}
