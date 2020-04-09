<!-- Plugins css -->
<link href="{{ URL::asset('assets/libs/flatpickr/flatpickr.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/libs/multiselect/multiselect.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('css/Mystyle.css') }}" rel="stylesheet" type="text/css" />

<div class="card rounded shadow" id="create-invoice-details">
        <div class="card-body">
                <form action="invoices.store" method="POST" class="row border border-warning">
                    @csrf
                    
                    {{-- Invoice Details --}}
                    <div class="col-sm-8">        
                        {{-- Invoice No --}}
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="invoice_no">Invoice No</label>
                            <div class="col-sm-4">
                                <input type="text" name="invoice_no" class="form-control" value="invoice->id">
                            </div>
                        </div>

                        {{-- Invoice Date --}}
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="invoice_date">Invoice Date</label>    
                            <div class="input-group col-sm-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fas fa-calendar" id="calendar-icon"></i> </span>
                                </div>
                                <input type="text" class="form-control" id="invoice-date"value="{{now()->format('yyyy/mm/dd')}}">
                            </div>
                        </div>

                        {{-- Payment Due --}}
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="payment_due">Payment Due</label>
                            <div class="input-group col-sm-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-calendar-alt" id="calendar-icon"></i></span>
                                </div>
                                <input class="form-control" type="text" id="invoice-payment-due" name="payment_due" value="{{now()->format('YYYY-mm-dd')}}">
                            </div>
                        </div>
                    </div>
                
                    {{-- Add Customers --}}
                    <div class="col-sm-4">
                        <div class="w-100 h-100 ">
                            <div class="dropup show w-100 h-100">
                                <a href="" class="dropdown-toggle border border-dark rounded d-flex h-100 justify-content-center align-items-center" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-user-plus" id="user-icon" style="font-size: 23px; color: black"></i> <span style="font-size: 15px; padding-left:4px; font-weight: bold">Add Customer</span>   
                                </a>
                              
                                <div class="dropdown-menu dropdown mx-100 border border-info" aria-labelledby="dropdownMenuLink">
                                  <a class="dropdown-item w-25" href="#">Ali Modahd</a>
                                  <a class="dropdown-item" href="#">Salah Saleem</a>
                                  <a class="dropdown-item" href="#">Muaath Almhram</a>
                                </div>
                            </div> 
                        </div>
                    </div>

                    {{-- Add items --}}
                    <div class="table-responsive-sm mt-5 col-sm-12">
                        <table class="table">
                            <thead class="thead-info" style="background: #dce3e9">
                                <tr class="">
                                    <th scope="col" class="w-50">Items</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Price</th>
                                    <th scope="col" class="text-right">Amount</th>
                                    <th scope="col"></th>
                                </tr>
                                
                            </thead>
                            <tbody>
                                    <tr>
                                        <td>item one</td>
                                        <td>2</td>
                                        <td>30$</td>
                                        <td class="text-right">60$</td>
                                        <td class="text-right" style="width:13px;">
                                            <a href="" class=" ">
                                                <i class="far fa-trash-alt text-danger" style="font-size:18px;"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" colspan="5">
                                            <a href="" class="btn btn-link">
                                                <i class="fas fa-plus-circle"></i> <span class="text-primary font-weight-bold">Add an item</span> 
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-right" colspan="3">
                                            <strong>  Total</strong> 
                                        </td>
                                        <td class="text-right" colspan="2">
                                            <strong> $5200 </strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" class="pt-5 py-0">
                                            <div class="form-group">
                                                <label for="notes"> Notes</label>
                                                <textarea name="notes"  class="form-control" cols="150" rows="3" placeholder="Notes Should be here" resized="none"></textarea>
                                            </div>
                                        </td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </form> 
        </div>
</div>


@section('script')
<!-- Plugins Js -->

<script src="{{ URL::asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/select2/select2.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/multiselect/multiselect.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/form-advanced.init.js') }}"></script>

@endsection