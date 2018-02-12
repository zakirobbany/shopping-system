@extends('core::layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Registrasi Karyawan</div>
                    <form action="{{ route('courier.update', $courier->id) }}" class="form-horizontal" method="post" style="margin-top: 20px; margin-bottom: 20px">
                        {{ csrf_field() }}

                        <div class="form-group @if($errors->has('courier_type_id')) has-error @endif">
                            <label for="courier_type_id" class="control-label col-sm-2">Tiper Kurir</label>
                            <div class="col-sm-5">
                                <select name="courier_type_id" id="courier_type_id" class="form-control">
                                    @foreach($courierTypes as $courierType)
                                        <option value="{{ $courierType->id }}" @if($courierType->id == $courierType->id) selected @endif>
                                            {{ $courierType->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group @if ($errors->has('name')) has-error @endif">
                            <label for="name" class="control-label col-sm-2">Nama</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="name" id="name" value="{{ $courier->name }}">
                            </div>
                        </div>

                        <div class="form-group @if ($errors->has('address')) has-error @endif">
                            <label for="address" class="control-label col-sm-2">Alamat</label>
                            <div class="col-sm-5">
                                <input type="text" id="address" name="address" class="form-control" value="{{ $courier->address }}">
                            </div>
                        </div>

                        <div class="form-group @if ($errors->has('phone_number')) has-error @endif">
                            <label for="phone_number" class="control-label col-sm-2">Nomor Telefon</label>
                            <div class="col-sm-5">
                                <input type="text" id="phone_number" name="phone_number" class="form-control" value="{{ $courier->phone_number }}">
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
