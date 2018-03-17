<?php

namespace App\Services\ServicePayments;

use App\Models\Billing\Payment;
use Illuminate\Http\Request;

class ServicePayment
{
    private $request;
    private $payment;

    public function __construct(Payment $payment, Request $request)
    {
        $this->payment = $payment;
        $this->request = $request;
    }

    public function storePayment()
    {
        foreach ($this->request->product_id as $key => $productId) {
            if ($productId) {
                $this->payment->products()->attach($productId, [
                    'quantity' => $this->request->quantity[$key],
                    'discount' => $this->request->discount[$key],
                    'total_price' => $this->request->total_price[$key],
                ]);
            }
        }

        $this->payment->save();
    }
}