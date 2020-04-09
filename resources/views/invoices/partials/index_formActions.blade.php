
<div class="btn-group" role="group" aria-label="@lang('labels.backend.access.customers.customer_actions')">
    
    {{-- SHOW --}}                                 
        <a href="{{ route('customers.show', $customer) }}" id="action-button" data-toggle="tooltip" data-placement="top" title="@lang('buttons.general.crud.view')" class="btn btn-info">
            <i class="fas fa-eye"></i>
        </a>

    {{-- EDIT --}}
        <a href="{{ route('customers.edit', $customer) }}" id="action-button" data-toggle="tooltip" data-placement="top" title="@lang('buttons.general.crud.edit')" class="btn btn-primary">
                <i class="fas fa-edit"></i>
        </a>

    {{-- DELETE --}}
    <form action="{{ route('customers.delete', $customer) }}" method="post">
        @csrf
        @method('DELETE')
        <button  type="submit" data-method="delete" id="action-button" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="@lang('buttons.general.crud.delete')" data-trans-button-cancel="@lang('buttons.general.cancel')" data-trans-button-confirm="@lang('buttons.general.crud.delete')" data-trans-title="@lang('strings.backend.general.are_you_sure')" class="dropdown-item"title="@lang('buttons.general.crud.delete')">
            <i class="fas fa-trash"></i>        
        </button>
    </form>

</div>