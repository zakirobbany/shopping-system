<?php

namespace Modules\Billing\Http\Controllers;

use App\Models\Billing\Payment;
use App\Services\ServicePaginator\ServicePaginator;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $now = Carbon::now();
        $today = $now->toDateString();

        $payments = Payment::where('date', $today)
            ->orderBy('created_at', 'desc')
            ->get();

        $option = [
            'path' => url('inventory/product-brand'),
        ];
        $paginator = new ServicePaginator(20, $request->page, $option);
        $payments = $paginator->paginate($payments);

        return view('billing::payment.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('billing::payment.create');
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
