@extends('core::layouts.master')

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
                            <div class="col-sm-10 col-sm-offset-1">
                                <a href="{{ route('customer.index') }}">
                                    <div class="panel panel-primary">
                                        <div class="panel-body">
                                            <div class="pull-left">Jumlah Customer</div>
                                            <div class="pull-right">{{ \App\Models\Core\Customer::all()->count() }}</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-10 col-sm-offset-1">
                                <a href="{{ route('supplier.index') }}">
                                    <div class="panel panel-danger">
                                        <div class="panel-body">
                                            <div class="pull-left">Jumlah Sales</div>
                                            <div class="pull-right">{{ \App\Models\Core\Supplier::all()->count() }}</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-10 col-sm-offset-1">
                                <a href="{{ route('employee.index') }}">
                                    <div class="panel panel-success">
                                        <div class="panel-body">
                                            <div class="pull-left">Jumlah Karyawan</div>
                                            <div class="pull-right">{{ \App\Models\Core\Employee::all()->count() }}</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-10 col-sm-offset-1">
                                <a href="{{ route('courier.index') }}">
                                    <div class="panel panel-info">
                                        <div class="panel-body">
                                            <div class="pull-left">Jumlah Kurir</div>
                                            <div class="pull-right">{{ \App\Models\Core\Courier::all()->count() }}</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
