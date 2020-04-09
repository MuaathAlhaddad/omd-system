<div class="card shadow" >
    <div class="card-body">

        {{-- Card Header --}}
        <div class="row">
            <div class="col-sm-5">
                <h1 class="card-title mb-0 font-weight-bold">
                    New Invoice
                </h1>
            </div>
            <div class="col-sm-7  ">
                <a href="{{ route('invoices.store') }}" class="btn btn-primary float-right " id="action-btn" data-toggle="tooltip" title="Save">
                    <i class="far fa-save " id="action-icon" style="right:12%"></i>
                </a>
                <a href="{{ route('invoices.show') }}" class="btn btn-info float-right" id="action-btn" data-toggle="tooltip" title="Preview">
                    <i class="fas fa-eye " id="action-icon"></i>
                </a>
            </div>
        </div>
    </div>
</div>