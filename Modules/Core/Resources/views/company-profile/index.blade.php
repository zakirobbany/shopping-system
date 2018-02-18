@extends('core::layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Toko</div>
                    <form action="{{ route('company-profile.update', $companyProfile->id) }}" class="form-horizontal" method="post" style="margin-top: 20px; margin-bottom: 20px">
                        {{ csrf_field() }}

                        <div class="form-group @if ($errors->has('name')) has-error @endif">
                            <label for="name" class="control-label col-sm-2">Nama</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="name" id="name" value="{{ $companyProfile->name }}">
                            </div>
                        </div>

                        <div class="form-group @if ($errors->has('vision')) has-error @endif">
                            <label for="vision" class="control-label col-sm-2">Visi</label>
                            <div class="col-sm-5">
                                <input type="text" id="vision" name="vision" class="form-control" value="{{ $companyProfile->vision }}">
                            </div>
                        </div>

                        <div class="form-group @if ($errors->has('mission')) has-error @endif">
                            <label for="mission" class="control-label col-sm-2">Misi</label>
                            <div class="col-sm-5">
                                <input type="text" id="mission" name="mission" class="form-control" value="{{ $companyProfile->mission }}">
                            </div>
                        </div>

                        <div class="form-group @if ($errors->has('about')) has-error @endif">
                            <label for="about" class="control-label col-sm-2">Tentang</label>
                            <div class="col-sm-5">
                                <textarea rows="4" cols="50" id="about" name="about" class="form-control">
                                    {{ $companyProfile->about }}
                                </textarea>
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
