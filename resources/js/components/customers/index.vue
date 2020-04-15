<template>

    <div class="card ">

        <div class="card-body">

            <!-- Card Header (Title & Create btn) -->
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mt-2">
                        User Management
                    </h4>
                </div>

                <div class="col-sm-7">
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



            <!-- Customer List (Card Content)  -->
            <div class="row mt-4">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th @click="orderCustomers('index')">#</th>
                                    <th @click="orderCustomers('first_name')">Full Name</th>
                                    <th @click="orderCustomers('email')">Email</th>
                                    <th @click="orderCustomers('phone_no')">Phone No</th>
                                    <th @click="orderCustomers('address')" class="text-center w-25">Address</th>
                                    <th @click="orderCustomers('created_at')">Created at</th>
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
                                            
                                            <!-- {{-- SHOW --}} -->
                                            <router-link :to="{ path: `/customers/${customer.id}`,params: {id: customer.id} }" class="btn btn-info" title="View Customer" data-toggle="tooltip" data-placement="top">
                                                <i class="fas fa-eye"></i>
                                            </router-link>



                                            <!-- {{-- EDIT --}} -->
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary"  data-toggle="modal" :data-target="'#'+customer.first_name+customer.id" title="Edit Customer">
                                                <i class="fas fa-edit"></i>                                                    
                                            </button>
                                                <!-- Modal -->
                                                <div class="modal fade" :id="customer.first_name+customer.id" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                                            
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button class="btn btn-primary" type="button" @click="UpdateCustomer(customer)" data-dismiss="modal">Save changes</button>
                                                            </div>
                                                          <!-- </form> -->

                                                        </div>
                                                    </div>
                                                </div>

                                            <!-- {{-- DELETE --}} -->
                                            <button  v-on:click="DeleteCustomer(customer)" data-toggle="tooltip" data-placement="top" title="Delete Customer" class="btn btn-danger ">
                                                    <i class="fas fa-trash"></i>        
                                            </button>
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
                                    <li class="page-item"><a class="page-link" :href="pagination.next">Next</a></li>
                                </ul>
                            </nav>
                        </span>
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
            pagination:{
                prev: '', 
                next: '', 
                last: '', 
                current: ''
            },
        }
    },
    created() {
            this.fetchCustomers();
    },
    computed:{
        reverseCustomers(){
            return this.customers.reverse();
        },
        // orderByCreated_at(){
             
        // },
        now(){
            const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
                                "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
            const now = new Date();
            return now.getDate()+'-'+now.getMonth()+'-'+now.getFullYear();
        }
    },
    methods: {
        orderCustomers(attribute){
            this.customers = _.orderBy(this.customers, attribute);
        },
        fetchCustomers(){
            fetch('api/customers')
            .then( res => res.json())
            .then( res => {
                this.customers = res.data;
                this.pagination.prev = res.links.prev;
                this.pagination.next = res.links.next;
                this.pagination.last = res.meta.last_page;
                this.pagination.current = res.meta.current_page;
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
            console.log
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
        }
    } 
}
</script>