<?php

namespace Modules\Report\Http\Controllers;

use App\Charts\AddStockChart;
use App\Models\Inventory\ProductStock;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $now = Carbon::now();
        $today = $now->toDateString();
        $thisMonth = $now->format('m');
        $addStockChart = new AddStockChart();
        $productStocks = ProductStock::all();
        $todayProductStocks = ProductStock::where('date', $today)
            ->get();
        $thisMonthProductStocks = ProductStock::whereMonth('date', $thisMonth )
            ->get();

        $arrayData = [];
        foreach ($productStocks as $productStock) {
            array_push($arrayData, $productStock->quantity);
        }
        $addStockChart->dataset('Add Stock', 'line', [100, 50, 240]);
        return view('report::index', compact('addStockChart',
            'todayProductStocks', 'thisMonthProductStocks', 'now'
        ));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('report::create');
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
        return view('report::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('report::edit');
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
