<?php

namespace Modules\Report\Http\Controllers;

use App\Charts\ReportChart;
use App\Services\Report\ServiceReport;
use App\Services\Report\ServiceReportChart;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class ReportController extends Controller
{
    private $reports;
    private $sellingChart;
    private $stockChart;
    private $customerChart;
    private $serviceReportChart;

    public function __construct()
    {
        $this->reports = new ServiceReport();

        $this->sellingChart = new ReportChart();
        $this->stockChart = new ReportChart();
        $this->customerChart = new ReportChart();

        $this->serviceReportChart = new ServiceReportChart();
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $now = Carbon::now();
        $sellingChart = $this->sellingChart;
        $stockChart = $this->stockChart;
        $customerChart = $this->customerChart;

        $sellingChart->dataset('Penjualan', 'line', $this->serviceReportChart->sellingDataSet())
            ->options(['backgroundColor' => '#5179b3']);
        $sellingChart->labels($this->serviceReportChart->sellingLabel());

        $stockChart->dataset('Penambahan Stock', 'bar', $this->serviceReportChart->stockDataSet())
            ->options(['backgroundColor' => '#5179b3']);
        $stockChart->labels($this->serviceReportChart->stockDataLabel());

        $customerChart->dataset('Pembeli Terbanyak', 'bar', $this->serviceReportChart->customerDataSet())
            ->options(['backgroundColor' => '#5179b3']);
        $customerChart->labels($this->serviceReportChart->customerDataLabel());

        return view('report::index', compact('now','sellingChart', 'stockChart', 'customerChart'));
    }

    /**
     * used to retrieve daily and monthly
     * added stock report
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function stock()
    {
        $now = Carbon::now();
        $todayProductStocks = $this->reports->todayProductStocks();
        $thisMonthProductStocks = $this->reports->thisMonthProductStocks();

        return view('report::stock.index', compact('now', 'todayProductStocks',
            'thisMonthProductStocks'));
    }

    public function sell()
    {
        $now = Carbon::now();
        $todayPayments = $this->reports->todayPayments();
        $thisMonthPayments = $this->reports->thisMonthPayments();
        $todayProfit = $this->reports->todayProfit();
        $thisMonthProfit = $this->reports->thisMonthProfit();

        return view('report::sell.index', compact('now', 'todayPayments', 'thisMonthPayments',
            'todayProfit', 'thisMonthProfit'));
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
