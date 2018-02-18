@extends('core::layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    @include('core::layouts.tool-button')
                    <div class="panel-heading">Jenis Kurir</div>

                    @if($courierTypes->isNotEmpty())
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
                                        <th></th>
                                    </tr>
                                    @foreach($courierTypes as $courierType)
                                        <tr>
                                            <td>{{ $courierType->name }}</td>
                                            <td>
                                                <div class="pull-right">
                                                    <a type="button" href="{{ route('courier-type.edit', $courierType->id) }}" class="btn btn-success ">
                                                        <i class="fa fa-pencil"></i> Ubah
                                                    </a>
                                                    <a href="{{ route('courier-type.delete', $courierType->id) }}" data-method="delete"
                                                       data-confirm="{{ trans('messages.confirm_delete') }}" class="btn btn-danger">
                                                        <i class="fa fa-trash"></i> <span class="hidden-xs">Hapus</span>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
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
