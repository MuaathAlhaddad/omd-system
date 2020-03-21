@extends('layouts.vertical')
@section('content')

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('labels.backend.access.customers.management') }}
                    </h4>
                </div><!--col-->

                <div class="col-sm-7">
                    <div class="btn-toolbar float-right" role="toolbar" aria-label="@lang('labels.general.toolbar_btn_groups')">
                        <a href="{{ route('customers.create') }}" class="btn btn-success ml-1" data-toggle="tooltip" title="@lang('labels.backend.access.customers.create')"><i class="fas fa-plus-circle"></i></a>
                    </div>
                </div><!--col-->

            </div>

            <div class="row mt-4">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>@lang('labels.backend.access.customers.table.first_name')</th>
                                    <th>@lang('labels.backend.access.customers.table.last_name')</th>
                                    <th>@lang('labels.backend.access.customers.table.email')</th>
                                    <th>@lang('labels.backend.access.customers.table.phone_no')</th>
                                    <th>@lang('labels.backend.access.customers.table.address')</th>
                                    <th>@lang('labels.backend.access.customers.table.created_at')</th>
                                    <th>@lang('labels.general.actions')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($customers as $customer)
                                    <tr>
                                        <td>{{ $customer->first_name }}</td>
                                        <td>{{ $customer->last_name }}</td>
                                        <td>{{ $customer->email }}</td>
                                        <td>{{ $customer->phone_no }}</td>
                                        <td>{{ $customer->address }}</td>
                                        <td>{{ $customer->created_at }}</td>
                                        <td class="btn-td">
                                            @include('customers.index_form_actoins')
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!--col-->
            </div><!--row-->
            <div class="row">
                <div class="col-7">
                    {{-- <div class="float-left">
                        {!! $customers->total() !!} {{ trans_choice('labels.backend.access.customers.table.total', $customers->total()) }}
                    </div> --}}
                </div><!--col-->

                <div class="col-5">
                    {{-- <div class="float-right">
                        {!! $customers->render() !!}
                    </div> --}}
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->
@endsection