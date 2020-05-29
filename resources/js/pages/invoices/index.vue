<template>
<div>
    <div class="card">
        <div class="card-body">
            
            <!-- Card Header (Title & Create btn) -->
            <div class="row">
                    <div class="col-sm-4">
                        <h4 class="card-title font-weight-bold">
                            Invoices
                        </h4>
                    </div> 

                    <div class="col-sm-4 align-self-end">
                    </div>
            
                    <div class=" col-sm-4">
                        <div class="btn-toolbar float-right" role="toolbar" aria-label="@lang('labels.general.toolbar_btn_groups')">
                            <!-- Create Customer router -->
                            <router-link :to="{ path: `/invoices/create`}" class="btn btn-success" title="Create New Invoice" data-toggle="tooltip" data-placement="top">
                                    <i class="fas fa-plus-circle" id="action-icon" style="right:3%"></i>
                            </router-link>                    
                        </div>
                    </div>
            </div>

            <!-- Search Bar -->
            <div class="row">
                <b-input-group class=" w-50 m-auto ">                        
                    <b-form-input
                    placeholder="Search for Invoices"
                    v-model="filter"
                    class="rounded-pill searchbar"
                    >
                    </b-form-input>
                </b-input-group>
            </div>
            <!-- invoices lists -->
            <div class="row">
                <div class="col">
                     <b-table
                        show-empty 
                        :filter="filter"
                        @filtered="on_filtered"
                        id="invoices-table" 
                        :sort-by.sync="sort_by"
                        :sort-desc.sync="sort_desc"
                        :items="invoices" 
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

                        <template v-slot:cell(customer)="data">
                            {{data.item.customer.first_name}}
                            {{data.item.customer.last_name}}
                        </template>
                     </b-table>
                </div>
            </div>
            <!-- footer -->
            <div class="row mt-4">
                <b-pagination
                    class=" m-auto justify-content-center"
                    aria-controls="#invoices-table"
                    v-model="current_page"
                    :total-rows="rows"
                    :per-page="per_page"
                >
                </b-pagination>
            </div>
            
        </div>
    </div>
</div>
</template>
<script>
export default {
    data() {
        return {
            fields:[
                {key: 'status', sortable:true},
                {key: 'payment_due', sortable:true},
                {key: 'invoice_date', sortable:true},
                {key: 'id',label: 'Invoice No', sortable:false},
                {key: 'customer', sortable:true},
                {key: 'amount_due',label: 'Amount Due', sortable:true}
                ],
            invoices:[],
            invoice: {
            id: '',
            title: "",
            invoice_date: "",
            payment_due: "",
            notes: "",
            approval: '',
            footer: "",
            customer_id: '',
            updated_at: "",
            created_at: "",
            },
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
            current_page:1,
            per_page: 10,
            sort_by: 'created_at',
            sort_desc: false,
            filter: null,
            filter_on:[],

        }
    },
    computed:{
        rows(){
            return this.invoices.length;
        }
    },
    methods: {
        fetchInvoices(){
                fetch('api/invoices')
                .then( res => res.json())
                .then( res => {
                    console.log(res.data);
                    this.invoices = res.data;
                })
                .catch( err => console.log(err));
        },
        on_filtered(filtered_items){
            this.rows
        }
    },
    created() {
        this.fetchInvoices();
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