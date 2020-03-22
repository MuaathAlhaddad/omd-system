@extends('layouts.vertical')
@section('content')
    <div class="card">
        <form action="{{route('customers.store')}}" method="post" class= 'form-horizontal'>
            @csrf
            <div class="card-body">
                                                {{-- Form Header --}}
                <div class="row">
                    <div class="col-sm-5">
                        <h4 class="card-title mb-0">
                            @lang('labels.backend.access.customers.create')
                        </h4>
                    </div>
                </div>

                <hr>
                                                {{-- Form inputs --}}

                    {{-- first_name --}}
                    <div class="row mt-4 mb-4">
                        <div class="col">
                            <div class="form-group row">
                                <label for="first_name" class="col-md-2 form-control-label">
                                    {{__('validation.attributes.backend.access.customers.first_name')}}
                                </label>
                                <div class="col-md-10">
                                    <input type="text" name="first_name" class="form-control" placeholder="{{__('validation.attributes.backend.access.customers.first_name')}}" required autofocus >
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- last_name --}}
                    <div class="row mt-4 mb-4">
                        <div class="col">
                            <div class="form-group row">
                                <label for="last_name" class="col-md-2 form-control-label">
                                    {{__('validation.attributes.backend.access.customers.last_name')}}
                                </label>
                                <div class="col-md-10">
                                    <input type="text" name="last_name" class="form-control" placeholder="{{__('validation.attributes.backend.access.customers.last_name')}}" required autofocus >
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- email --}}
                    <div class="row mt-4 mb-4">
                        <div class="col">
                            <div class="form-group row">
                                <label for="email" class="col-md-2 form-control-label">
                                    {{__('validation.attributes.backend.access.customers.email')}}
                                </label>
                                <div class="col-md-10">
                                    <input type="email" name="email" class="form-control" placeholder="{{__('validation.attributes.backend.access.customers.email')}}" required autofocus >
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    {{-- phone_no --}}
                    <div class="row mt-4 mb-4">
                        <div class="col">
                            <div class="form-group row">
                                <label for="phone_no" class="col-md-2 form-control-label">
                                    {{__('validation.attributes.backend.access.customers.phone_no')}}
                                </label>
                                <div class="col-md-10">
                                    <input type="text" name="phone_no" class="form-control" placeholder="{{__('validation.attributes.backend.access.customers.phone_no')}}" required autofocus >
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- address --}}
                    <div class="row mt-4 mb-4">
                        <div class="col">
                            <div class="form-group row">
                                <label for="address" class="col-md-2 form-control-label">
                                    {{__('validation.attributes.backend.access.customers.address')}}
                                </label>
                                <div class="col-md-10">
                                    <input type="text" name="address" class="form-control" placeholder="{{__('validation.attributes.backend.access.customers.address')}}" required autofocus >
                                </div>
                            </div>
                        </div>
                    </div>

                    
            </div>
            <div class="card-footer clearfix">
                <div class="row">
                    <div class="col">
                        <a href="{{route('customers.index')}}" class="btn btn-danger">
                            {{__('buttons.general.cancel') }}
                        </a>
                    </div>

                    <div class="col text-right">
                    <button type="submit" class="btn btn-success">{{__('buttons.general.crud.create')}}</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection