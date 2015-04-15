@extends('master.internal')

@section('content')
    <div class="container">
    <div class="row">
        <div class="col-md-3">
            @include('admin.sidebar')
        </div>
        <div class="col-md-9">
            @yield('admincontent')
        </div>
    </div>
    </div>
@stop
