@extends('layouts.vertical')
@section('content')
    <div id="customer-app">
        @include('customers/partials/alert_success')
        <omd-customers></omd-customers>
    </div>
    
    <script src="{{ asset('js/app.js') }}" defer></script>


@endsection