@extends('inventory::layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Tambah Stock Produk</div>
                    <form action="{{ route('product.store-add-stock') }}" class="form-horizontal" method="post" style="margin-top: 20px; margin-bottom: 20px">
                        {{ csrf_field() }}

                        <div class="form-group @if ($errors->has('product_id')) has-error @endif">
                            <label for="product_id" class="control-label col-sm-2">Produk</label>
                            <div class="col-sm-5">
                                <select name="product_id" id="product_id" class="form-control">
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}">
                                            {{ $product->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-10 col-sm-offset-2" style="margin-bottom: 15px; margin-top: -10px;">
                            <small>
                                Tidak menemukan produk yang kamu cari ? <a href="{{ route('product.create') }}">Tambah Produk</a>
                            </small><br />
                        </div>

                        <div class="form-group @if ($errors->has('quantity')) has-error @endif">
                            <label for="quantity" class="control-label col-sm-2">Jumlah Stock</label>
                            <div class="col-sm-5">
                                <input type="number" class="form-control" name="quantity" id="price" value="">
                            </div>
                        </div>

                        <div class="button" style="margin-left: 80px;">
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
