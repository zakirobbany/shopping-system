@extends('core::layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Registrasi Karyawan</div>
                    <form action="{{ route('employee.store') }}" class="form-horizontal" method="post" style="margin-top: 20px; margin-bottom: 20px">
                        {{ csrf_field() }}

                        <div class="form-group @if ($errors->has('name')) has-error @endif">
                            <label for="name" class="control-label col-sm-2">Nama</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="name" id="name" value="">
                            </div>
                        </div>

                        <div class="form-group @if ($errors->has('address')) has-error @endif">
                            <label for="address" class="control-label col-sm-2">Alamat</label>
                            <div class="col-sm-5">
                                <input type="text" id="address" name="address" class="form-control" value="">
                            </div>
                        </div>

                        <div class="form-group @if ($errors->has('phone_number')) has-error @endif">
                            <label for="phone_number" class="control-label col-sm-2">Nomor Telefon</label>
                            <div class="col-sm-5">
                                <input type="text" id="phone_number" name="phone_number" class="form-control" value="">
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
