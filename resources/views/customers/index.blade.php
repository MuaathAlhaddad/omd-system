@extends('layouts.vertical')
@section('content')
THIS IS THE THE PLACE WHERE MY VUE IS GOIING TO LIVE
@include('customers/partials/alert_success')
    <div id="customer-app">
    </div>
    
    <script src="{{ asset('js/app.js') }}" defer></script>


@endsection