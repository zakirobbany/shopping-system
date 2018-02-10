@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                        <center>
                            <div class="col-sm-6">
                                <a href="{{url('/core')}}">
                                    <div class="panel panel-primary">
                                        <div class="panel-body">Core</div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-6">
                                <a href="{{url('/inventory')}}">
                                    <div class="panel panel-danger">
                                        <div class="panel-body">Inventory</div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-6">
                                <a href="{{url('/billing')}}">
                                    <div class="panel panel-success">
                                        <div class="panel-body">Billing</div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-6">
                                <a href="{{url('/report')}}">
                                    <div class="panel panel-info">
                                        <div class="panel-body">Report</div>
                                    </div>
                                </a>
                            </div>
                        </center>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
