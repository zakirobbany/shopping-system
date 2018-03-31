@extends('billing::layouts.master')

@section('content')
  {{--<div id="app">
    <modern-payment></modern-payment>
  </div>--}}
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          @include('layouts.flash')
          <div class="panel-heading">Penjualan Baru</div>
          <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
              <form action="{{ route('payment.store') }}" class="form-horizontal" method="post" style="margin-top: 20px; margin-bottom: 20px">
                {{ csrf_field() }}

                <div class="form-group @if ($errors->has('customer_name')) has-error @endif" style="margin-left: -100px">
                  <label for="customer_name" class="control-label col-sm-2">Pembeli</label>
                  <div class="col-sm-5">
                    <select name="customer_name" class="form-control select2">
                      <option value=""></option>
                      @foreach($customers as $customer)
                        <option value="{{ $customer->id }}">
                          {{ $customer->name }}
                        </option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <payment-component></payment-component>

                <div class="button">
                  <button type="submit" class="btn btn-success">Simpan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@stop
