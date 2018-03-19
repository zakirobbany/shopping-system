<?php

namespace Modules\Billing\Http\Controllers;

use App\Models\Billing\Payment;
use App\Models\Inventory\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class BillingController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $now = Carbon::now();
        $today = $now->toDateString();

        $todayPayments = Payment::where('date', $today)
            ->get();
        $monthlyPayments = Payment::whereYear('created_at', $now->year)
            ->whereMonth('created_at', $now->month)
            ->get();

        $dailyCountBilling = $todayPayments->count();
        $dailyBilling = $todayPayments->sum('total_payment');

        $monthlyCountBilling = $monthlyPayments->count();
        $monthlyBilling = $monthlyPayments->sum('total_payment');

        return view('billing::index', compact('dailyCountBilling', 'dailyBilling',
            'monthlyCountBilling', 'monthlyBilling'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('billing::create');
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
        return view('billing::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('billing::edit');
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
