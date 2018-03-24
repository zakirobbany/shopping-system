<?php

namespace Modules\Report\Http\Controllers;

use App\Charts\AddStockChart;
use App\Services\Report\ServiceReport;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class ReportController extends Controller
{
    private $reports;

    public function __construct()
    {
        $this->reports = new ServiceReport();
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $now = Carbon::now();
        $addStockChart = new AddStockChart();
        $todayProductStocks = $this->reports->todayProductStocks();
        $thisMonthProductStocks = $this->reports->thisMonthProductStocks();
        $todayPayments = $this->reports->todayPayments();
        $thisMonthPayments = $this->reports->thisMonthPayments();
        $todayProfit = $this->reports->todayProfit();
        $thisMonthProfit = $this->reports->thisMonthProfit();

        $addStockChart->dataset('Add Stock', 'line', [100, 50, 240]);
        return view('report::index', compact('addStockChart',
            'todayProductStocks', 'thisMonthProductStocks', 'now',
            'todayPayments', 'thisMonthPayments', 'todayProfit', 'thisMonthProfit'
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
