<template>
<div>
    <div class="card">
        <div class="card-body">
            <!-- Card Header (Title & Create btn) -->
            <div class="row ">
                    <b-alert id="alert"  :show="alert_sec" :variant="alert_color"
                                @dismissed="alert_sec=0" @dismiss-count-down="countDown"                            
                                class=" fixed-top position-fixed w-25 m-0 text-center rounded-0"
                                style="-index: 2000; left: 700px;  top: 100px;"
                                fade>
                                <span v-html="alert_message"></span>
                    </b-alert>
                    <div class="col-sm-4">
                        <h4 class="card-title font-weight-bold">
                            User Management
                        </h4>
                    </div>

                    <div class="col-sm-4 align-self-end">
                    </div>

                    <div class=" col-sm-4">
                        <div class="btn-toolbar float-right">

                            <!-- {{-- CREATE CUSTOMER --}} -->
                            <b-button   @click="showModal('customerModal')"  variant="success" title="Create New Customer">
                                <i class="fas fa-plus-circle" id="action-icon" style="right:3%"></i>
                            </b-button>

                            <!-- Modal Customer Create -->
                            <omd-modal   :customers="customers"   modalType="create" @create-customer="customerCreated($event)"></omd-modal>
              
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
                    ref="table"
                    :key="customer.id"
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

                                        <!-- {{-- SHOW CUSTOMER--}} -->
                                        <router-link :to="{ path: `/customers/${data.item.id}`,params: {id: data.item.id} }" class="btn btn-info" title="View Customer" data-toggle="tooltip" data-placement="top">
                                            <i class="fas fa-eye"></i>
                                        </router-link>


                 
                                        <!-- {{-- EDIT CUSTOMER --}} -->
                                        <b-button   @click="showModal(data.item)" variant="primary" title="Edit Customer">
                                            <i class="fas fa-edit"></i>
                                        </b-button> 
                                        <!--Edit Customer Modal-->
                                        <omd-modal  modalType="edit" :selectedCustomer="data.item" :key="data.item.id"  :customers="customers" @update-customer="customerUpdated(data.item, $event)" ></omd-modal>
                     
                                        <!-- {{-- DELETE CUSTOMER--}} -->
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
import modal from '../customers/modal.vue';
    export default {
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
                alert_sec: 0,
                alert_duration: 2,
                alert_message: '',
                alert_color: '',
            }
        },
        computed:{
            now(){
                const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
                                    "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
                const today = new Date();
                let day = today.getDate().toString();
                let month = (today.getMonth()+1).toString();
                let year = today.getFullYear().toString();
                return year+'-'+month+'-'+ day;
            },
            rows() {
                return this.customers.length
            }
        },
        methods: {
            showModal(customer){
                if(customer ===  'customerModal') {
                   this.$root.$emit('bv::show::modal', 'customerModal')                    
                } else
                   this.$root.$emit('bv::show::modal', customer.first_name.replace(/\s/g, '')+customer.id);
            },
            fetchCustomers(){
                fetch('api/customers')
                .then( res => res.json())
                .then( res => {
                    this.customers = res.data;
                })
                .catch( err => console.log(err));
            },
            DeleteCustomer(customer){
                this.$bvModal.msgBoxConfirm(' ',{
                        title: "Are you sure?",        
                        okVariant: 'success',
                        cancelTitle: 'No',
                        okTitle: 'Yes',
                        cancelVariant: 'danger',
                        headerClass: 'border-0 justify-content-center',
                        footerClass: 'border-0 justify-content-center'
                })
                .then(value => {
                    if(value) {
                        fetch(`api/customers/${customer.id}`, {
                            method: 'Delete'
                        })
                        .then(res => res.json())
                        .then(data => {
                            var index = this.customers.indexOf(customer);
                            this.$delete(this.customers, index);
                            let self = this;
                            setTimeout( function() {
                                self.alert_message = 'CUSTOMER DELETED SUCCESSFULLY &nbsp; <i class="fas fa-check"></i> ';
                                self.alert_color = 'success';
                                self.show_alert();
                            }, 1000);
                        })
                        .catch( error => console.log(error));
                    }
                })
                .catch(e => console.log(e))                    
            },  
            on_filtered(filtered_items){
                this.rows;
            }, 
            customerCreated(e){
                this.customers.push(e);
                let self = this;
                setTimeout( function() {
                    self.alert_message = 'CUSTOMER CREATED SUCCESSFULLY &nbsp; <i class="fas fa-check"></i> ';
                    self.alert_color = 'success';
                    self.show_alert();
                }, 1000);
            },
            customerUpdated(customer, e){
                customer = e;
                let self = this;
                setTimeout( function() {
                    self.alert_message =  'CUSTOMER UPDATED SUCCESSFULLY &nbsp; <i class="fas fa-check"></i> ';
                    self.alert_color = 'success';
                    self.show_alert();
                }, 1000);
            },
            show_alert(){
            this.alert_sec = this.alert_duration;
            },
            countDown(alert_sec){
                this.alert_sec = alert_sec;
            }
        },
        created() {
            this.fetchCustomers();
        },
        components: {'omd-modal': modal}
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
    .btn:focus{
        outline: 0;
        box-shadow: 0 0 0 0;
    }
</style>