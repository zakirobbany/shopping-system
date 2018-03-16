@extends('billing::layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    @include('billing::layouts.tool-button')
                    <div class="panel-heading">Penjualan</div>

                    @if($payments->isNotEmpty())
                        @php($no = 1)
                        <div class="panel-body">
                            @include('layouts.flash')
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <center>
                                <table class="table">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Satuan Barang</th>
                                        <th>Harga Satuan</th>
                                        <th>Jumlah</th>
                                        <th>Potongan</th>
                                        <th>Jumlah Harga</th>
                                    </tr>
                                    @foreach($payments as $payment)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $payment->name }}</td>
                                            <td>{{ $payment->product->product_type }}</td>
                                            <td>{{ $payment->quantity }}</td>
                                            <td>{{ $payment->discount }}</td>
                                            <td>{{ $payment->total_price }}</td>
                                            <td>
                                                <div class="pull-right">
                                                    <a type="button" href="{{ route('product-brand.edit', $payment->id) }}" class="btn btn-success ">
                                                        <i class="fa fa-pencil"></i> Ubah
                                                    </a>
                                                    <a href="{{ route('product-brand.delete', $payment->id) }}" data-method="delete"
                                                       data-confirm="{{ trans('messages.confirm_delete') }}" class="btn btn-danger">
                                                        <i class="fa fa-trash"></i> <span class="hidden-xs">Hapus</span>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                                <div class="paginator text-center">{{ $payments->links() }}</div>
                            </center>
                        </div>
                    @else
                        <div class="panel-body">
                            <div class="alert alert-warning text-center">Tidak Ada Data.</div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @include('inventory::layouts.modal-filter')
@stop
