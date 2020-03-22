@extends('layouts.vertical')
@section('content')

    @if (Session::has('success'))   
        <div class="alert alert-soft-success alert-dismissible fade show" role="alert">
                {{Session::get('success')}} <i class="fas fa-check-circle"></i>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif


    <div class="card">
        <div class="card-body">
            {{-- Card Header --}}
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('labels.backend.access.customers.management') }}
                    </h4>
                </div>

                <div class="col-sm-7">
                    <div class="btn-toolbar float-right" role="toolbar" aria-label="@lang('labels.general.toolbar_btn_groups')">
                        <a href="{{ route('customers.create') }}" id="action-button" class="btn btn-success" data-toggle="tooltip" title="@lang('labels.backend.access.customers.create')"><i class="fas fa-plus-circle"></i></a>
                    </div>
                </div><!--col-->

            </div>
            {{-- Customer List (Card Content) --}}
            <div class="row mt-4">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Full Name</th>
                                    <th>@lang('labels.backend.access.customers.table.email')</th>
                                    <th>@lang('labels.backend.access.customers.table.phone_no')</th>
                                    <th class="text-center w-25">@lang('labels.backend.access.customers.table.address')</th>
                                    <th>@lang('labels.backend.access.customers.table.created_at')</th>
                                    <th class="text-center">@lang('labels.general.actions')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($customers as $index => $customer)
                                    <tr >
                                        
                                        <td class="align-middle">{{ $index+1 }}</td>
                                        <td class="align-middle">{{ $customer->first_name }} {{ $customer->last_name }}</td>
                                        <td class="align-middle">{{ $customer->email }}</td>
                                        <td class="align-middle">{{ $customer->phone_no }}</td>
                                        <td class="align-middle">{{ $customer->address }}</td>
                                        <td class="align-middle">{{ $customer->created_at->format('Y-m-d') }}</td>
                                        <td class="btn-td">
                                            @include('customers.index_form_actoins')
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!--col-->
            </div>

            {{-- Card Footer --}}
            <div class="row">
                <div class="col-5 float-left">
                        <small class="text-muted">     Total Customers {{ $customers->total() }} </small>  
                </div>

                <div class="col-7 float-left">
                        <span>{{ $customers->links() }}</span>
                </div>
            </div>
        </div>
    </div><!--card-->
@endsection