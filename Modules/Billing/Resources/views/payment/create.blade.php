@extends('billing::layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Penjualan Baru</div>
                    <form action="{{ route('product-brand.store') }}" class="form-horizontal" method="post" style="margin-top: 20px; margin-bottom: 20px">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Barang</th>
                                            <th>Satuan Barang</th>
                                            <th>Harga Barang</th>
                                            <th>Jumlah</th>
                                            <th>Potongan Harga</th>
                                            <th>Jumlah Harga</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Semen Gresik</td>
                                            <td>biji</td>
                                            <td>Rp 55.000</td>
                                            <td>5</td>
                                            <td></td>
                                            <td>Rp 275.000</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="form-group @if ($errors->has('name')) has-error @endif">
                            <label for="name" class="control-label col-sm-2">Nama</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="name" id="name" value="">
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
