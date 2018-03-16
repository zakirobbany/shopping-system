@extends('billing::layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
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
                                        <div class="pull-right">127</div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="pull-left">Penghasilan Hari Ini</div>
                                        <div class="pull-right">Rp. 13.957.500</div>
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