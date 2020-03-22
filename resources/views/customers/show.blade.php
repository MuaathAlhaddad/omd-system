@extends('layouts.vertical')
@section('content')
<div class="card">
    <div class="card-body">
        {{-- Table Heading --}}
        <div class="row">
            <div class="col-sm-10">
                <h4 class="card-title mb-0">
                    Customer Profile
                </h4>
            </div>
        </div>
        <hr>

        {{-- Table Content --}}
        <div class="row">
            <div class="col-sm-10">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">

                        <tr>
                            <th>First Name</th>
                            <td>{{ $customer->first_name  }}</td>
                        </tr>

                        <tr>
                            <th>Last Name</th>
                            <td>{{ $customer->last_name  }}</td>
                        </tr>

                        <tr>
                            <th>Email</th>
                            <td>{{ $customer->email }}</td>
                        </tr>

                        <tr>
                            <th>Phone No</th>
                            <td>{{ $customer->phone_no }}</td>
                        </tr>

                        <tr>
                            <th>Address</th>
                            <td>{{ $customer->address }}</td>
                        </tr>

                        <tr>
                            <th>Created At</th>
                            <td>{{ $customer->created_at->format('Y/m/d') }}</td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>
        <div class="clearfix">
            <a href="{{route('customers.index')}}" class="btn btn-primary float-left">Back</a>
            <form action="{{route('customers.delete', $customer)}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger float-right">Delete</button>
            </form>
        </div>
        
    </div>
</div>
@endsection