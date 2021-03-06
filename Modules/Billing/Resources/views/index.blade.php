@extends('billing::layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    @include('billing::layouts.tool-button')
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <center>
                            <div class="col-sm-12">
                                <div class="panel panel-primary">
                                    <div class="panel-body">
                                        <div class="pull-left">Penjualan Hari Ini</div>
                                        <div class="pull-right">{{ $dailyCountBilling }}</div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="pull-left">Penghasilan Hari Ini</div>
                                        <div class="pull-right">Rp. {{ number_format($dailyBilling) }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="panel panel-danger">
                                    <div class="panel-body">
                                        <div class="pull-left"><P></P>enjualan Bulan Ini</div>
                                        <div class="pull-right">{{ $monthlyCountBilling }}</div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="pull-left">Penghasilan Bulan Ini</div>
                                        <div class="pull-right">Rp. {{ number_format($monthlyBilling) }}</div>
                                    </div>
                                </div>
                            </div>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop