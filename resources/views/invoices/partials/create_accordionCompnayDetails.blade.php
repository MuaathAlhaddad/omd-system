<section id="style">
    <link href="{{ URL::asset('assets/libs/dropzone/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
</section>

<section id="content">
    <div class="accordion " id="accordion">
        <div class="card rounded shadow">
        
            <div class="rounded-top h-50" style="background-color:#dce3e9;" id="headingOne">
                <button class="h4 p-2 border-0" style="background: #dce3e9;" data-toggle="collapse" data-target="#contact_details" aria-expanded="true" aria-controls="contact_details">
                    <span class=" font-weight-bold">Business address and contact details, title, summary, and logo</span> 
                </button>
            </div>
    
            <div id="contact_details" class="collapse " aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                    <div class="row mt-2">
                        
                        <div class="col-sm-8">
                            <div class="col-sm-8 border border-danger">
                                <style>#invoice-create input[value]{font-size:2em;}textarea{resize: none;}</style>
                                <div class="form-group" id="invoice-create">
                                    <input type="text" name="title" id="invoice_title" class="form-control" value="Invoice">
                                </div>
                                <div class="form-group">
                                    <textarea name="" id="" cols="30" rows="5" class="form-control" placeholder="Summary (e.g. Project name, desc of invoice)"></textarea>
                                </div>
                            </div>
    
                            <div class="col-sm-8 ">
                                <h6>
                                    WMS.DISCOVERY       {{--  {{company_details->name}}  --}}
                                </h6>
                                <span class="text-muted d-block">
                                    Kuala Lumpur             {{--  {{company_details->address}}  --}}
                                    Malaysia          
                                </span>
                                    
                                <a href="" class="btn btn-link font-weight-bold">
                                    Edit your business address and contact details 
                                </a>                   
                            </div >
                        </div>
    
                        <div class="col-sm-4">
                            {{-- @include('invoices/partials/create_logo-dropzone') --}}
                            <form action="/" method="post" class="dropzone" id="myAwesomeDropzone" style="border: 2px dashed #B2B2B2">
                                <div class="fallback">
                                    <input name="file" type="file" multiple />
                                </div>
                                <div class="dz-message needsclick">
                                    <i class=""></i>
                                    <i class="fas fa-cloud-upload-alt text-muted" style="user-select: auto; font-size: 5em;"></i>
                                    <h3>Browse or drop your logo here</h3>
                                    <span class="text-muted font-11">  
                                        Maximum 5MB in size.
                                        JPG, PNG, or GIF formats.
                                        Recommended size: 300 x 200 pixels.
                                    </span>
                                </div>
                            </form>
                        </div>
    
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section id="script">
    <script src="{{ URL::asset('assets/libs/dropzone/dropzone.min.js') }}"></script>
</section>
