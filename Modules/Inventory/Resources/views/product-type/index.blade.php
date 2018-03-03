@extends('inventory::layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    @include('inventory::layouts.tool-button')
                    <div class="panel-heading">Jenis Produk</div>

                    @if($productTypes->isNotEmpty())
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
                                        <th>Nama</th>
                                    </tr>
                                    @foreach($productTypes as $productType)
                                        <tr>
                                            <td>{{ $productType->name }}</td>
                                        </tr>
                                    @endforeach
                                </table>
                                <div class="paginator text-center">{{ $productTypes->links() }}</div>
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
