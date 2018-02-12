<?php

namespace Modules\Core\Http\Controllers;

use App\Models\Core\Employee;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Core\Http\Requests\EmployeeRequest;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param EmployeeRequest $request
     * @return Response
     */
    public function index(EmployeeRequest $request)
    {
        $employees = Employee::select(DB::raw("id, name, address, phone_number"));
        if ($request->has('filter_name')) {
            $employees->where('name', 'like', '%' . $request->filter_name . '%');
        }
        $employees = $employees->paginate();

        return view('core::employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('core::employee.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param EmployeeRequest $request
     * @return Response
     */
    public function store(EmployeeRequest $request)
    {
        $employee = new Employee();
        $employee->create($request->all());

        flash('berhasil menambahkan ' . $request->name)->success();

        return redirect(route('employee.index'));
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
        $employee = Employee::find($id);

        return view('core::employee.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     * @param EmployeeRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(EmployeeRequest $request, $id)
    {
        $employee = Employee::find($id);
        $employee->fill([
            'name' => $request->name,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
        ]);
        $employee->save();

        flash('Berhasil Memperbaharui ' . $employee->name)->success();

        return redirect(route('employee.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        Employee::find($id)->delete();
        flash('Berhasil Dihapus')->success();

        return redirect(route('employee.index'));
    }

    public function delete($id)
    {
        Employee::find($id)->delete();
        flash('Berhasil Dihapus')->success();

        return redirect(route('employee.index'));
    }
}
