@extends('report::layouts.master')

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
                            {{--<div class="col-sm-12">
                                <div class="panel panel-primary">
                                    <div class="panel-body">
                                        {{ $addStockChart->container() }}
                                    </div>
                                </div>
                            </div>--}}
                            <div class="col-sm-12">
                                <div class="panel panel-primary">
                                    <div class="panel-title" style="margin-top: 10px; color: #8c8c8c">
                                        PENAMBAHAN STOCK HARI INI
                                        <span>
                                            {{ __(\Carbon\Carbon::parse($todayProductStocks->first()->date)->format('l')) .
                                            $todayProductStocks->first()->date }}
                                        </span>
                                    </div>
                                    <div class="panel-body" style="color: #8c8c8c">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>Nama Barang</th>
                                                <th>Merek Barang</th>
                                                <th>Jumlah</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($todayProductStocks as $todayProductStock)
                                                    <tr>
                                                        <td>{{ $todayProductStock->product->name }}</td>
                                                        <td>{{ $todayProductStock->product->productBrand->name }}</td>
                                                        <td>{{ $todayProductStock->quantity }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="panel panel-success">
                                    <div class="panel-title" style="margin-top: 10px; color: #8c8c8c">
                                        PENAMBAHAN STOCK BULAN INI
                                    </div>
                                    <div class="panel-body" style="color: #8c8c8c">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>Nama Barang</th>
                                                <th>Merek Barang</th>
                                                <th>Tanggal</th>
                                                <th>Jumlah</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($thisMonthProductStocks as $thisMonthProductStock)
                                                <tr>
                                                    <td>{{ $thisMonthProductStock->product->name }}</td>
                                                    <td>{{ $thisMonthProductStock->product->productBrand->name }}</td>
                                                    <td>{{ $thisMonthProductStock->date }}</td>
                                                    <td>{{ $thisMonthProductStock->quantity }}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
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
{{--
@section('script')
    {{ $addStockChart->script() }}
@endsection--}}
