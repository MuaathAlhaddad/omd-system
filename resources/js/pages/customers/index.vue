<template>
<div>
    <div class="card">

        <div class="card-body">

            <!-- Card Header (Title & Create btn) -->
            <div class="row ">
                    <div class="col-sm-4">
                        <h4 class="card-title font-weight-bold">
                            User Management
                        </h4>
                    </div> 

                    <div class="col-sm-4 align-self-end">
                    </div>
            
                    <div class=" col-sm-4">
                        <div class="btn-toolbar float-right" role="toolbar" aria-label="@lang('labels.general.toolbar_btn_groups')">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#customer-form" title="Create New Customer">
                                    <i class="fas fa-plus-circle" id="action-icon" style="right:3%"></i>
                            </button>                        
                        </div>
                    </div>
            </div>

                <!-- Modal Customer Create-->
                <div class="modal fade" id="customer-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <!-- Modal header -->
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Create New Customer</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                                <!-- Modal Body -->
                                <div class="modal-body">
                                        <!-- first_name -->
                                        <div class="form-group row">
                                            <label for="first_name" class="col-sm-3 col-form-label">First Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" v-model="customer.first_name">
                                            </div>
                                        </div>

                                        <!-- last_name -->
                                        <div class="form-group row">
                                            <label for="last_name" class="col-sm-3 col-form-label">Last Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" v-model="customer.last_name">
                                            </div>
                                        </div>

                                        <!-- Email -->
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-3 col-form-label">Email</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" v-model="customer.email">
                                            </div>
                                        </div>

                                        <!-- phone_no -->
                                        <div class="form-group row">
                                            <label for="phone_no" class="col-sm-3 col-form-label">Phone no</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" v-model="customer.phone_no">
                                            </div>
                                        </div>

                                        <!-- address -->
                                        <div class="form-group row">
                                            <label for="address" class="col-sm-3 col-form-label">Address</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" v-model="customer.address">
                                            </div>
                                        </div>
                                </div>
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button class="btn btn-primary" data-dismiss="modal" type="submit" @click="CreateCustomer">Add Customer</button>
                                </div>
                        </div>
                    </div>
                </div>

            <!-- Search Bar -->
            <div class="row ">
                    <b-input-group class=" w-50 m-auto ">                        
                        <b-form-input
                        placeholder="Search for Customers"
                        v-model="filter"
                        class="rounded-pill searchbar"
                        >
                        </b-form-input>
                    </b-input-group>
            </div>

            <!-- Customer List (Card Content)  -->
            <div class="row ">
                <div class="col">  
                    <b-table
                    show-empty 
                    :filter="filter"
                    @filtered="on_filtered"
                    id="customers-table" 
                    :sort-by.sync="sort_by"
                    :sort-desc.sync="sort_desc"
                    :items="customers" 
                    :fields="fields" 
                    :per-page="per_page" 
                    :current-page="current_page" 
                    responsive
                    hover
                    head-variant="light"
                    class="text-center mt-4"
                    >
                        <template v-slot:cell(#)="data">
                            {{data.index+1}}
                        </template>
                        <template v-slot:cell(first_name)="data">
                            {{data.item.first_name}} {{data.item.last_name}}
                        </template>

                        <template v-slot:cell(actions)="data">
                                    
                                    <div class="btn-group" role="group" aria-label="@lang('labels.backend.access.customers.customer_actions')">

                                        <!-- {{-- SHOW --}} -->
                                        <router-link :to="{ path: `/customers/${data.item.id}`,params: {id: data.item.id} }" class="btn btn-info" title="View Customer" data-toggle="tooltip" data-placement="top">
                                            <i class="fas fa-eye"></i>
                                        </router-link>



                                        <!-- {{-- EDIT --}} -->
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary"  data-toggle="modal" :data-target="'#'+data.item.first_name+data.item.id" title="Edit Customer">
                                            <i class="fas fa-edit"></i>                                                    
                                        </button>
                                            <!-- Modal -->
                                            <div class="modal fade" :id="data.item.first_name+data.item.id" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Edit Customer</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                      <!-- <form action="" @submit="UpdateCustomer"> -->
                                                        <div class="modal-body">
                                                            <!-- first_name -->
                                                            <div class="form-group row">
                                                                <label for="first_name" class="col-sm-3 col-form-label">First Name</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control" v-model="data.item.first_name">
                                                                </div>
                                                            </div>

                                                            <!-- last_name -->
                                                            <div class="form-group row">
                                                                <label for="last_name" class="col-sm-3 col-form-label">Last Name</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control" v-model="data.item.last_name">
                                                                </div>
                                                            </div>

                                                            <!-- Email -->
                                                            <div class="form-group row">
                                                                <label for="email" class="col-sm-3 col-form-label">Email</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control" v-model="data.item.email">
                                                                </div>
                                                            </div>

                                                            <!-- phone_no -->
                                                            <div class="form-group row">
                                                                <label for="phone_no" class="col-sm-3 col-form-label">Phone no</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control" v-model="data.item.phone_no">
                                                                </div>
                                                            </div>

                                                            <!-- address -->
                                                            <div class="form-group row">
                                                                <label for="address" class="col-sm-3 col-form-label">Address</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control" v-model="data.item.address">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button class="btn btn-primary" type="button" @click="UpdateCustomer(data.item)" data-dismiss="modal">Save changes</button>
                                                        </div>
                                                      <!-- </form> -->

                                                    </div>
                                                </div>
                                            </div>

                                        <!-- {{-- DELETE --}} -->
                                        <button  v-on:click="DeleteCustomer(data.item)" data-toggle="tooltip" data-placement="top" title="Delete Customer" class="btn btn-danger ">
                                                <i class="fas fa-trash"></i>        
                                        </button>
                                    </div>                

                        </template>

                    </b-table>
                    
                
                </div>
            </div>

            <hr>
            <!-- {{-- Card Footer --}} -->
            <div class="row">
                <div class="col-sm-4">
                        <small class="text-muted">     Total Customers {{rows}}  </small>  
                </div>

                <div class="col-sm-4">
                    <b-pagination
                        class=" m-auto justify-content-center"
                        pills
                        :per-page="per_page"
                        :total-rows="rows"
                        v-model="current_page"
                        aria-controls="#customers-table"
                    >
                    </b-pagination>
                </div>
                <div class="col-sm-4">

                </div>
            </div>

        </div>
        

    </div>    
</div>
</template>
<script>
    export default {
        props:['data-target'],
        data() {
            return {
                per_page: 10,
                current_page: 1,
                fields: [
                    {key:'#', sortable: false},
                    {key:'first_name',label: 'Name', sortable: true, class:"w-25"},
                    {key:'phone_no', sortable: true},
                    {key:'email', sortable: true},
                    {key:'created_at', sortable: true},
                    {key:'actions', sortable: false},
                    ],
                sort_by: 'created_at',
                sort_desc: false,
                filter: null,
                filter_on:[],
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
                dismiss_modal:'',
            }
        },
        created() {
                this.fetchCustomers();
        },
        computed:{
            now(){
                const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
                                    "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
                const now = new Date();
                return now.getDate()+'-'+now.getMonth()+'-'+now.getFullYear();
            },
            rows() {
            return this.customers.length
        }
        },
        methods: {
            fetchCustomers(){
                fetch('api/customers')
                .then( res => res.json())
                .then( res => {
                    this.customers = res.data;
                })
                .catch( err => console.log(err));
            },
            DeleteCustomer(customer){
                    if (confirm('Are you Sure?')) {
                        fetch(`api/customers/${customer.id}`, {
                            method: 'Delete'
                        })
                        .then(res => res.json())
                        .then(data => {
                            alert('Customer Deleted Successfully');
                            var index = this.customers.indexOf(customer);
                            this.$delete(this.customers, index);
                        })
                        .catch( error => console.log(error));
                    }
                    
            }, 
            UpdateCustomer(customer){
                customer.updated_at = this.now;
                customer.first_name = customer.first_name.charAt(0).toUpperCase() + customer.first_name.slice(1);
                fetch(`api/customers/${customer.id}`, {
                    method: 'put',
                    body: JSON.stringify(customer), 
                    headers:{
                        'content-type': 'application/json'
                    }
                })
                .then(res => res.json())
                .then(data => {
                        // console.log(data.data);
                        alert('Customer Update Successfully');
                })
                .catch(error => console.log(error));
            },
            CreateCustomer(){
                this.customer.created_at = this.now;
                this.customer.first_name = this.customer.first_name.charAt(0).toUpperCase() + this.customer.first_name.slice(1);
                console.log(this.customer);
                fetch('api/customers', {
                    method: 'post', 
                    body: JSON.stringify(this.customer), 
                    headers:{
                        'content-type': 'application/json'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    alert('Customer Added');
                    this.customers.push(this.customer);
                })
                .catch(err => console.log(err));
            }, 
            on_filtered(filtered_items){
                this.rows;
            }, 
        },
    }
</script>
<style scoped>
    .searchbar{
        padding: 20px;
        background-color: #F3F4F7;
    }
    .searchbar::placeholder{
        color: #A9AAAA;
        text-align: center;
        text-transform:uppercase;
        font-size: 15px;
        letter-spacing:3px;
    }
</style>