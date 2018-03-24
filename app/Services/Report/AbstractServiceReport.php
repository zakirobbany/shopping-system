<?php

namespace App\Services\Report;

use App\Models\Billing\Payment;
use App\Models\Inventory\ProductStock;
use Carbon\Carbon;

abstract class AbstractServiceReport
{
    protected $now;
    protected $startDate;
    protected $endDate;
    protected $thisMonth;
    protected $thisYear;
    protected $today;

    public function __construct()
    {
        $this->now = Carbon::now();
        $this->parseDate();
    }

    public function setStartDate(Carbon $carbon)
    {
        $this->startDate = $carbon;
    }

    public function setEndDate(Carbon $carbon)
    {
        $this->endDate = $carbon;
    }

    public function thisYear()
    {
        return $this->thisYear = $this->now->year;
    }

    public function thisMonth()
    {
        return $this->thisMonth = $this->now->month;
    }

    public function today()
    {
        return $this->today = $this->now->toDateString();
    }

    public function productStocks()
    {
        return ProductStock::all();
    }

    public function payments()
    {
        return Payment::all();
    }

    public function parseDate()
    {
        $this->startDate = Carbon::now()->firstOfMonth();
        $this->endDate = Carbon::now()->endOfMonth();
    }

}
