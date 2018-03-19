<?php

namespace App\Services;

use App\Models\Billing\Payment;

class DateRangePicker
{
    protected $startDate;
    protected $endDate;

    public function __construct($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function payments()
    {
        $payments = Payment::whereBetween('date', [$this->startDate, $this->endDate])
            ->orderBy('date', 'desc')
            ->get();

        return $payments;
    }
}