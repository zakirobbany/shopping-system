@extends('inventory::layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard Inventori</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <center>
                            <div class="col-sm-10 col-sm-offset-1">
                                <a href="{{ route('product.index') }}">
                                    <div class="panel panel-primary">
                                        <div class="panel-body">
                                            <div class="pull-left">Jumlah Produk</div>
                                            <div class="pull-right">{{ \App\Models\Inventory\Product::all()->count() }}</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-10 col-sm-offset-1">
                                <a href="{{ route('product-brand.index') }}">
                                    <div class="panel panel-danger">
                                        <div class="panel-body">
                                            <div class="pull-left">Jumlah Brand</div>
                                            <div class="pull-right">{{ \App\Models\Inventory\ProductBrand::all()->count() }}</div>
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
