<?php

namespace App\Services\Report;

use App\Models\Billing\Payment;
use App\Models\Core\Customer;
use App\Models\Inventory\Product;
use App\Models\Inventory\ProductStock;
use Carbon\Carbon;

class ServiceReportChart
{
    /**
     * used to get sells
     * in a month grouped by date
     * @return mixed
     */
    public function sells()
    {
        $thisMonth = Carbon::now()->month;
        $payments = Payment::whereMonth('date', $thisMonth)
            ->orderBy('date', 'asc')
            ->get();

        $payments = $payments->groupBy('date');
        $totalPayments = $payments->map(function ($payment) {
            return $payment->sum('total_payment');
        });

        return $totalPayments;
    }

    /**
     * used to get total payment
     * in a month grouped per date
     * @return array
     */
    public function sellingDataSet()
    {
        $dataSets = collect();
        foreach ($this->sells() as $sell) {
            $dataSets->push($sell);
        }

        return $dataSets->toArray();
    }

    /**
     * used to get a date
     * in a month
     * @return array
     */
    public function sellingLabel()
    {
        $dataLabels = collect();
        foreach ($this->sells() as $key => $sell) {
            $dataLabels->push($key);
        }

        return $dataLabels->toArray();
    }

    /**
     * used to get monthly product stock
     * grouped by product_id
     * @return mixed
     */
    public function stocks()
    {
        $thisMonth = Carbon::now()->month;
        $stocks = ProductStock::whereMonth('date', $thisMonth)
            ->orderBy('product_id')
            ->limit(10)
            ->get();
        $stocks = $stocks->groupBy('product_id');
        $stocks = $stocks->map(function ($stock) {
           return $stock->sum('quantity');
        });

        return $stocks;
    }

    /**
     * used to set data set
     * of product stock chart
     * @return array
     */
    public function stockDataSet()
    {
        $dataSets = collect();
        foreach ($this->stocks() as $stock) {
            $dataSets->push($stock);
        }

        return $dataSets->toArray();
    }

    /**
     * used to set labels
     * of product stock chart
     * @return array
     */
    public function stockDataLabel()
    {
        $dataLabels = collect();
        foreach ($this->stocks() as $key => $stock) {
            $product = Product::find($key);
            $dataLabels->push($product->name);
        }

        return $dataLabels->toArray();
    }

    public function customers()
    {
        $customerPayments = collect();
        $customers = Customer::with('payments')->limit(10)->get();
        foreach ($customers as $customer) {
            $thisMonthPayments = $customer->payments->filter(function ($payment) {
                if (substr($payment->date, 5, 2) == Carbon::now()->month) {
                    return $payment;
                }
            });
            $customerPayments->push($thisMonthPayments);
        }

        return $customerPayments;
    }

    public function customerDataSet()
    {
        $dataSets = collect();
        foreach ($this->customers() as $customer) {
            $dataSets->push($customer->sum('total_payment'));
        }

        return $dataSets->toArray();
    }

    public function customerDataLabel()
    {
        $dataLabels = collect();
        foreach ($this->customers() as $customer) {
            $dataLabels->push(Customer::find($customer->first()->customer_id)->name);
        }

        return $dataLabels->toArray();
    }
}
