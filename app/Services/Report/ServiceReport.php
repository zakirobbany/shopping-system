<?php

namespace App\Services\Report;

class ServiceReport extends AbstractServiceReport
{
    public function todayProductStocks()
    {
        return $this->productStocks()->where('date', '=', $this->today());
    }

    public function thisMonthProductStocks()
    {
        $productStocks = $this->productStocks()->filter(function ($productStock) {
            if ($productStock->date >= $this->startDate and $productStock->date <= $this->endDate) {
                return $productStock;
            }
        });

        return $productStocks;
    }

    public function todayPayments()
    {
        return $this->payments()->where('date', '=', $this->today());
    }

    public function thisMonthPayments()
    {
        $payments = $this->payments()->filter(function ($payment) {
            if ($payment->date >= $this->startDate and $payment->date <= $this->endDate) {
                return $payment;
            }
        });

        return $payments;
    }

    public function todayProfit()
    {
        $totalModalPrice = collect();
        $totalSellPrice = collect();
        foreach ($this->todayPayments() as $todayPayment) {
            foreach ($todayPayment->products as $product) {
                $totalModalPrice->push($product->modal_price * $product->pivot->quantity);
            }
            $totalSellPrice->push($todayPayment->total_payment);
        }
        $totalModalPrice = $totalModalPrice->sum();
        $totalSellPrice = $totalSellPrice->sum();

        return $totalSellPrice - $totalModalPrice;
    }

    public function thisMonthProfit()
    {
        $totalModalPrice = collect();
        $totalSellPrice = collect();
        foreach ($this->thisMonthPayments() as $thisMonthPayment) {
            foreach ($thisMonthPayment->products as $product) {
                $totalModalPrice->push($product->modal_price * $product->pivot->quantity);
            }
            $totalSellPrice->push($thisMonthPayment->total_payment);
        }
        $totalModalPrice = $totalModalPrice->sum();
        $totalSellPrice = $totalSellPrice->sum();

        return $totalSellPrice - $totalModalPrice;
    }
}
