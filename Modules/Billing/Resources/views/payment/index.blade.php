@extends('billing::layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
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
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Barang</th>
                                            <th>Satuan Barang</th>
                                            <th>Harga Satuan</th>
                                            <th>Jumlah</th>
                                            <th>Potongan</th>
                                            <th>Jumlah Harga</th>
                                            <th>Total Pembayaran</th>
                                            <th></th>
                                        </tr>
                                        @foreach($payments as $payment)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>
                                                    @foreach($payment->products as $product)
                                                        {{ $product->name }}<br />
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach($payment->products as $product)
                                                        {{ $product->productType->name }}<br />
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach($payment->products as $product)
                                                        Rp. {{ number_format($product->sell_price) }}<br />
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach($payment->products as $product)
                                                        {{ $product->pivot->quantity }}<br />
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach($payment->products as $product)
                                                        Rp. {{ number_format($product->pivot->discount ) }}<br />
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach($payment->products as $product)
                                                        Rp. {{ number_format($product->pivot->total_price) }}<br />
                                                    @endforeach
                                                </td>
                                                <td>
                                                    Rp. {{ number_format($payment->total_payment ) }}
                                                </td>
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
                                </div>
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
