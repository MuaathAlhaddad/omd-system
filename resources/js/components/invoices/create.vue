<template>
<div>
    <!-- create_btnsAction -->
    <div class="card shadow" >
        <div class="card-body">

            <!-- {{-- Card Header --}} -->
            <div class="row">
                <div class="col-sm-5">
                    <h1 class="card-title mb-0 font-weight-bold">
                        New Invoice
                    </h1>
                </div>
                <div class="col-sm-7  ">
                    <a href="" class="btn btn-primary float-right " id="action-btn" data-toggle="tooltip" title="Save">
                        <i class="far fa-save " id="action-icon" style="right:12%"></i>
                    </a>
                    <a href="" class="btn btn-info float-right" id="action-btn" data-toggle="tooltip" title="Preview">
                        <i class="fas fa-eye " id="action-icon"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- create_accordionCompnayDetails -->
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
                                <div class="form-group" id="invoice-create">
                                    <input type="text" name="title" id="invoice_title" class="form-control" value="Invoice">
                                </div>
                                <div class="form-group">
                                    <textarea name="" id="" cols="30" rows="5" class="form-control" placeholder="Summary (e.g. Project name, desc of invoice)"></textarea>
                                </div>
                            </div>
    
                            <div class="col-sm-8 ">
                                <h6>
                                    WMS.DISCOVERY      <!-- {{--  {{company_details->name}}  --}} -->
                                </h6>
                                <span class="text-muted d-block">
                                    Kuala Lumpur             <!--{{--  {{company_details->address}}  --}}-->
                                    Malaysia          
                                </span>
                                    
                                <a href="#" class="btn btn-link font-weight-bold">
                                    Edit your business address and contact details 
                                </a>                   
                            </div >
                        </div>
    
                        <div class="col-sm-4">
                            <!-- @include('invoices/partials/create_logo-dropzone') -->
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
</div>
</template>

<script>
export default {
    
}
</script>
<style scoped>
    #invoice-create input[value]{
        font-size:2em;
    }
    textarea{
        resize: none;
    }
</style>