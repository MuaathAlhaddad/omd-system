<template>
    <div>

        <div class="card ">
            <div class="card-body">
                <!-- Card Header (Title & Create btn) -->
                <div class="row">
                    <div class="col-sm-5">
                        <h4 class="card-title mt-2">
                            Customer Management
                        </h4>
                    </div>

                    <div class="col-sm-7">
                        <div class="btn-toolbar float-right" role="toolbar" aria-label="@lang('labels.general.toolbar_btn_groups')">
                            <a href="" id="action-button" class="btn btn-success" data-toggle="tooltip" title="Create New Customer">
                                <i class="fas fa-plus-circle" id="action-icon" style="right:3%"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Customer List (Card Content)  -->
                <div class="row mt-4">
                    <div class="col">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Phone No</th>
                                        <th class="text-center w-25">Address</th>
                                        <th>Created at</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <tr v-for="(customer, index) in customers" :key="customer.id">
                                            <td class="align-middle"> {{index+1}} </td>
                                            <td class="align-middle"> {{customer.first_name}}   {{customer.last_name}} </td>
                                            <td class="align-middle"> {{customer.email}} </td>
                                            <td class="align-middle"> {{customer.phone_no}} </td>
                                            <td class="align-middle"> {{customer.address}} </td>
                                            <td class="align-middle"> {{customer.created_at}} </td>
                                            <td class="btn-td">
                                                  <div class="btn-group" role="group" aria-label="@lang('labels.backend.access.customers.customer_actions')">
                                                    
                                                    <!-- {{-- SHOW --}}                                  -->
                                                        <!-- <a @click="ShowCustomer(customer.id)" data-toggle="tooltip" data-placement="top" title="@lang('buttons.general.crud.view')" class="btn btn-info " id="action-btn">
                                                            <i class="fas fa-eye"></i>
                                                        </a> -->

                                                    <!-- {{-- EDIT --}} -->
                                                        <!-- <a href="{{ route('customers.edit', $customer) }}" data-toggle="tooltip" data-placement="top" title="@lang('buttons.general.crud.edit')" class="btn btn-primary " id="action-btn">
                                                                <i class="fas fa-edit"></i>
                                                        </a> -->

                                                    <!-- {{-- DELETE --}} -->
                                                    <span  v-on:click="DeleteCustomer(customer.id)" data-toggle="tooltip" data-placement="top" title="Delete Customer" class="btn btn-danger ">
                                                            <i class="fas fa-trash"></i>        
                                                    </span>
                                                </div>                                               
                                            </td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- {{-- Card Footer --}} -->
                <div class="row">
                    <div class="col-5 float-left">
                            <small class="text-muted">     Total Customers {{customers.length}}  </small>  
                    </div>

                    <div class="col-7 float-left">
                            <span> 
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <li class="page-item"><a class="page-link" :href="pagination.prev">Previous</a></li>
                                        <li class="page-item"><a class="page-link" > {{pagination.current}} out of {{pagination.last}} </a></li>
                                        <li class="page-item"><a class="page-link" :href="pagination.prev">Next</a></li>
                                    </ul>
                                </nav>
                            </span>
                    </div>
                </div>
            </div>
        </div>
          
    </div>
</template>

<script>
    export default {
        data(){
            return {
                customers: [],
                customer: {
                    id: '', 
                    first_name: '',
                    last_name: '',
                    phone_no: '',
                    address: '',
                    email: '',
                    created_at: '',
                    updated_at: '',
                }, 
                pagination:{
                    prev: '', 
                    next: '', 
                    last: '', 
                    current: ''
                },
                edit: false,
            };
        },
        created() {
            this.fetchCustomers();
        },
        methods: {
            fetchCustomers(){
                fetch('api/customers')
                .then( res => res.json())
                .then( res => {
                    console.log(res);
                    this.customers = res.data;
                    this.pagination.prev = res.links.prev;
                    this.pagination.next = res.links.next;
                    this.pagination.last = res.meta.last_page;
                    this.pagination.current = res.meta.current_page;
                })
                .catch( err => console.log(err));
            }, 
            DeleteCustomer(customer_id){
                fetch(`api/customers/${customer_id}`, {
                    method: 'Delete'
                })
                .then(res => res.json())
                .then(data => {
                    alert('Customer Deleted');
                    this.fetchCustomers();
                })
                .catch( error => console.log(error));
            }
        }
    }
</script>
