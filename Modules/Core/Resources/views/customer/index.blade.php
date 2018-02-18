@extends('core::layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    @include('core::layouts.tool-button')
                    <div class="panel-heading">Customer</div>

                    @if($customers->isNotEmpty())
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
                                        <th>Alamat</th>
                                        <th>Nomor Hp</th>
                                        <th></th>
                                    </tr>
                                    @foreach($customers as $customer)
                                        <tr>
                                            <td>{{ $customer->name }}</td>
                                            <td>{{ $customer->address }}</td>
                                            <td>{{ $customer->phone_number }}</td>
                                            <td>
                                                <div class="pull-right">
                                                    <a type="button" href="{{ route('customer.edit', $customer->id) }}" class="btn btn-success ">
                                                        <i class="fa fa-pencil"></i> Ubah
                                                    </a>
                                                    <a href="{{ route('customer.delete', $customer->id) }}" data-method="delete"
                                                       data-confirm="{{ trans('messages.confirm_delete') }}" class="btn btn-danger">
                                                        <i class="fa fa-trash"></i> <span class="hidden-xs">Hapus</span>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                                <div class="paginator text-center">{{ $customers->links() }}</div>
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

    @include('core::layouts.modal-filter')
@stop
