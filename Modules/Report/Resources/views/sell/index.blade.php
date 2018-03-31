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
                  <div class="panel-title" style="margin-top: 10px; color: #8c8c8c">
                    PENJUALAN HARI INI
                    <span>
                      {{ trans('messages.' . $now->format('l')) . ' ' . $now->toDateString() }}
                    </span>
                  </div>
                  <div class="panel-body" style="color: #8c8c8c">
                    <table class="table">
                      <thead>
                      <tr>
                        <th>Pembeli</th>
                        <th>Nama Barang</th>
                        <th>Merek Barang</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Potongan</th>
                        <th>Jumlah Harga</th>
                        <th>Total Pembayaran</th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach($todayPayments as $todayPayment)
                        <tr>
                          <td>
                            {{ $todayPayment->customer->name }}
                          </td>
                          <td>
                            @foreach($todayPayment->products as $product)
                              {{ $product->name }} <br/>
                            @endforeach
                          </td>
                          <td>
                            @foreach($todayPayment->products as $product)
                              {{ $product->productBrand->name }} <br/>
                            @endforeach
                          </td>
                          <td>
                            @foreach($todayPayment->products as $product)
                              Rp. {{ number_format($product->sell_price) }} <br/>
                            @endforeach
                          </td>
                          <td>
                            @foreach($todayPayment->products as $product)
                              {{ $product->pivot->quantity }} <br/>
                            @endforeach
                          </td>
                          <td>
                            @foreach($todayPayment->products as $product)
                              Rp. {{ number_format($product->pivot->discount) }} <br/>
                            @endforeach
                          </td>
                          <td>
                            @foreach($todayPayment->products as $product)
                              Rp. {{ number_format($product->pivot->total_price) }} <br/>
                            @endforeach
                          </td>
                          <td>
                            Rp. {{ number_format($todayPayment->total_payment) }}
                          </td>
                        </tr>
                      @endforeach
                      <tr>
                        <td><b>Total Pendapatan</b></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><b>Rp. {{ number_format($todayPayments->sum('total_payment')) }}</b></td>
                      </tr>
                      <tr>
                        <td><b>Total Profit</b></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><b>Rp. {{ number_format($todayProfit) }}</b></td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <div class="col-sm-12">
                <div class="panel panel-success">
                  <div class="panel-title" style="margin-top: 10px; color: #8c8c8c">
                    PENJUALAN BULAN INI
                  </div>
                  <div class="panel-body" style="color: #8c8c8c">
                    <table class="table">
                      <thead>
                      <tr>
                        <th>Tanggal</th>
                        <th>Pembeli</th>
                        <th>Nama Barang</th>
                        <th>Merek Barang</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Potongan</th>
                        <th>Jumlah Harga</th>
                        <th>Total Pembayaran</th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach($thisMonthPayments as $thisMonthPayment)
                        <tr>
                          <td>
                            {{ $thisMonthPayment->date }}
                          </td>
                          <td>
                            {{ $thisMonthPayment->customer->name }}
                          </td>
                          <td>
                            @foreach($thisMonthPayment->products as $product)
                              {{ $product->name }} <br/>
                            @endforeach
                          </td>
                          <td>
                            @foreach($thisMonthPayment->products as $product)
                              {{ $product->productBrand->name }} <br/>
                            @endforeach
                          </td>
                          <td>
                            @foreach($thisMonthPayment->products as $product)
                              Rp. {{ number_format($product->sell_price) }} <br/>
                            @endforeach
                          </td>
                          <td>
                            @foreach($thisMonthPayment->products as $product)
                              {{ $product->pivot->quantity }} <br/>
                            @endforeach
                          </td>
                          <td>
                            @foreach($thisMonthPayment->products as $product)
                              Rp. {{ number_format($product->pivot->discount) }} <br/>
                            @endforeach
                          </td>
                          <td>
                            @foreach($thisMonthPayment->products as $product)
                              Rp. {{ number_format($product->pivot->total_price) }} <br/>
                            @endforeach
                          </td>
                          <td>
                            Rp. {{ number_format($thisMonthPayment->total_payment) }}
                          </td>
                        </tr>
                      @endforeach
                      <tr>
                        <td><b>Total Pendapatan</b></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><b>Rp. {{ number_format($thisMonthPayments->sum('total_payment')) }}</b></td>
                      </tr>
                      <tr>
                        <td><b>Total Profit</b></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><b>Rp. {{ number_format($thisMonthProfit) }}</b></td>
                      </tr>
                      </tbody>
                    </table>
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
