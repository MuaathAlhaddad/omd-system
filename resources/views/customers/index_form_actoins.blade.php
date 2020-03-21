<div class="btn-group" role="group" aria-label="@lang('labels.backend.access.customers.customer_actions')">
                                                    
    <a href="{{ route('customers.show', $customer) }}" data-toggle="tooltip" data-placement="top" title="@lang('buttons.general.crud.view')" class="btn btn-info">
        <i class="fas fa-eye"></i>
    </a>

    <a href="{{ route('customers.edit', $customer) }}" data-toggle="tooltip" data-placement="top" title="@lang('buttons.general.crud.edit')" class="btn btn-primary">
        <i class="fas fa-edit"></i>
    </a>

    <a 
        href="{{ route('customers.delete', $customer) }}"
        data-method="delete"
        class="btn btn-danger"
        data-trans-button-cancel="@lang('buttons.general.cancel')"
        data-trans-button-confirm="@lang('buttons.general.crud.delete')"
        data-trans-title="@lang('strings.backend.general.are_you_sure')"
        class="dropdown-item"
        title="@lang('buttons.general.crud.delete')"
    >
        <i class="fas fa-trash"></i>
    </a>
</div>