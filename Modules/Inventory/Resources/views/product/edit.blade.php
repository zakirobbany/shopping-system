@extends('inventory::layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Perbaharui Produk</div>
                    <form action="{{ route('product.update', $product->id) }}" class="form-horizontal" method="post" style="margin-top: 20px; margin-bottom: 20px">
                        {{ csrf_field() }}

                        <div class="form-group @if ($errors->has('name')) has-error @endif">
                            <label for="name" class="control-label col-sm-2">Nama</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="name" id="name" value="{{ $product->name }}">
                            </div>
                        </div>

                        <div class="form-group @if ($errors->has('price')) has-error @endif">
                            <label for="price" class="control-label col-sm-2">Harga</label>
                            <div class="col-sm-5 input-group">
                                <div class="input-group-addon " style="padding-right: 10px">Rp</div>
                                <input type="number" class="form-control" name="price" id="price" value="{{ $product->price }}">
                            </div>
                        </div>

                        <div class="form-group @if ($errors->has('product_brand_id')) has-error @endif">
                            <label for="product_brand_id" class="control-label col-sm-2">Merek Produk</label>
                            <div class="col-sm-5">
                                <select name="product_brand_id" id="product_brand_id" class="form-control">
                                    @foreach($productBrands as $productBrand)
                                        <option value="{{ $productBrand->id }}" @if ($productBrand->id == $product->productBrand->id)
                                        selected @endif>
                                            {{ $productBrand->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-10 col-sm-offset-2" style="margin-bottom: 15px; margin-top: -10px;">
                            <small>
                                Tidak menemukan merek produk yang kamu cari ? <a href="{{ route('product-brand.create') }}">Tambah Merek Produk</a>
                            </small><br />
                        </div>

                        <div class="form-group @if ($errors->has('product_type_id')) has-error @endif">
                            <label for="product_type_id" class="control-label col-sm-2">Merek Produk</label>
                            <div class="col-sm-5">
                                <select name="product_type_id" id="product_type_id" class="form-control">
                                    @foreach($productTypes as $productType)
                                        <option value="{{ $productType->id }}" @if ($productType->id == $product->productType->id)
                                        selected @endif>
                                            {{ $productType->name }}
                                        </option>
                                    @endforeach
                                </select>
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
