@extends('layouts.vertical')
@section('content')

        @include('invoices/partials/alert-success')

    <div class="card">
        <div class="card-body">

            {{-- Card Header --}}
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        Invoice Managements
                    </h4>
                </div>

                <div class="col-sm-7">
                    <div class="btn-toolbar float-right" role="toolbar" aria-label="@lang('labels.general.toolbar_btn_groups')">
                        <a href="{{ route('invoices.create') }}" id="action-button" class="btn btn-success" data-toggle="tooltip" title="Create New Invoice"><i class="fas fa-plus-circle"></i></a>
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
                                @foreach($customers as $customer)
                                    <tr >
                                        
                                        <td class="align-middle">{{ $loop->iteration }}</td>
                                        <td class="align-middle">{{ $customer->first_name }} {{ $customer->last_name }}</td>
                                        <td class="align-middle">{{ $customer->email }}</td>
                                        <td class="align-middle">{{ $customer->phone_no }}</td>
                                        <td class="align-middle">{{ $customer->address }}</td>
                                        <td class="align-middle">{{ $customer->created_at->format('Y-m-d') }}</td>
                                        <td class="btn-td">
                                            @include('invoices/partials/.index_form_actions')
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