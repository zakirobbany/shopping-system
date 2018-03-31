@extends('report::layouts.master')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-md-offset-0">
        <div class="panel panel-default">
          <div class="panel-heading">Dashboard</div>

          <div class="panel-body">
            @if (session('status'))
              <div class="alert alert-success">
                {{ session('status') }}
              </div>
            @endif
            <center>
              <div class="col-sm-12">
                <div class="panel panel-primary">
                  <div class="panel-heading">Penjualan</div>
                  <div class="panel-body">
                    {!! $sellingChart->container() !!}
                  </div>
                </div>
              </div>

              <div class="col-sm-12">
                <div class="panel panel-primary">
                  <div class="panel-heading">Penambahan Stock Barang</div>
                  <div class="panel-body">
                    {!! $stockChart->container() !!}
                  </div>
                </div>
              </div>

              <div class="col-sm-12">
                <div class="panel panel-primary">
                  <div class="panel-heading">Pembeli Terbanyak</div>
                  <div class="panel-body">
                    {!! $customerChart->container() !!}
                  </div>
                </div>
              </div>

            </center>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@push('script')
  {!! $sellingChart->script()  !!}
  {!! $stockChart->script() !!}
  {!! $customerChart->script() !!}
@endpush
