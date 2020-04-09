@if (Session::has('success'))   
        <div class="alert alert-soft-success alert-dismissible fade show" role="alert">
                {{Session::get('success')}} <i class="fas fa-check-circle"></i>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif