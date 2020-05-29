<template>
    <div>
        
        <!-- Save & Preview header -->
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
                        <a href="" @click.prevent="Save_invoice" class="btn btn-primary float-right " id="action-btn" data-toggle="tooltip" title="Save">
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
            <div class="card rounded shadow" >
                <div class="rounded-top h-50" style="background-color:#dce3e9;" id="headingOne">
                    <button class="border-0 h4  p-2 w-100  ml-2 row" id="collapse" style="background: #dce3e9;" data-toggle="collapse" data-target="#contact_details" aria-expanded="true" aria-controls="contact_details">
                        <span class="col-sm-10 text-left p-0 font-weight-bold">Business address and contact details, title, summary, and logo</span> 
                        <span class="col-sm-2 text-right"><i class="fas fa-arrow-down"></i></span>
                    </button>
                </div>
        
                <div id="contact_details" class="collapse " aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <div class="row mt-2">
        
                            <div class="col-sm-4">
                                <div id="img-container" @click="uploadLogo()" >
                                    <div class="img-overlay">
                                        <i class="fas fa-cloud-upload-alt text-muted" style="user-select: auto; font-size: 5em;"></i>
                                        <h3>Browse or drop your logo here</h3>
                                        <span class="text-muted div-11">  
                                            Maximum 5MB in size.
                                            JPG, PNG, or GIF formats.
                                            Recommended size: 300 x 200 pixels.
                                        </span>
                                    </div>
                                    <input type="file" @change="setLogo()" id="upload">
                                </div>
                                
                            </div>

                            <div class="col-sm-8">
                                <div class="col-sm-8 float-right">
        
                                    <h2 class="font-weight-bold text-uppercase text-right mb-4">Invoice</h2>
        
                                    <div class="form-group">
                                        <textarea  id="" cols="30" rows="5" class="form-control" v-model="summary" placeholder="Summary (e.g. Project name, desc of invoice)"></textarea>
                                    </div>
                                </div>
        
                                <div class="col-sm-8 float-right">
                                    <h6>
                                        {{companyDetails.name}}
                                    </h6>
                                    <span class="text-muted d-block">
                                        {{companyDetails.address}}       
                                    </span>
                                    <span class="text-muted d-block">
                                        {{companyDetails.phone_no}}       
                                    </span>
                                    <span class="text-muted d-block">
                                        {{companyDetails.email}}       
                                    </span>
                                        
                                    <b-button id="company-details" @click="show_modal" variant="link" class="btn btn-link font-weight-bold">Edit your business address and contact details</b-button>
                                    <b-modal ref="company-details" hide-footer title="Edit Company Details">
                                            
                                            <form @submit.prevent="save_modal_form">
                                                <!-- Name -->
                                                <div class="form-group row">
                                                    <label for="name" class="col-sm-3 col-form-label">Name</label>
                                                    <div class="col-sm-9">
                                                        <input type="text"  class="form-control" @blur="setCompanyName" :value="companyDetails.name">
                                                    </div>
                                                </div>
                                                    <!-- Address -->
                                                <div class="form-group row">
                                                    <label for="address" class="col-sm-3 col-form-label">Address</label>
                                                        <div class="col-sm-9">
                                                            <textarea  class="form-control" @blur="setCompanyAddress" :value="companyDetails.address"  cols="30" rows="5" style="resize: none;"></textarea>
                                                        </div>
                                                </div>
                                                <!-- phone no -->
                                                <div class="form-group row">
                                                    <label for="phone_no" class="col-sm-3 col-form-label"> Phone No</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" @blur="setCompanyPhone_no" :value="companyDetails.phone_no">
                                                    </div>
                                                </div>
                                                <!-- email -->
                                                <div class="form-group row">
                                                    <label for="email" class="col-form-group col-sm-3">Email</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control"  @blur="setCompanyEmail" :value="companyDetails.email">
                                                    </div>
                                                </div>
                                                <b-button variant="outline-success" block class="mt-5" type="submit">Save Changes</b-button>
                                                <b-button variant="outline-danger" block class="mt-2" @click="reset_modal_form">Cancel</b-button>
                                            </form>
                                    </b-modal>
                                    


                                </div >
                            </div>
        
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- invoice Details -->
        <div class="card rounded shadow" id="create-invoice-details">
            <div class="card-body">
                <form action="#" method="POST" class="row">
                    
                    
                    <!-- {{-- Add Customers --}} -->
                    <div class="col-sm-4">
                            <div v-if="IsCustomerSelected">
                                <div class="p-2  font-weight-bold">
                                    Bill to    
                                </div>
                                <div class="pl-4">
                                        <div class="pt-2">{{customer.first_name}} {{customer.last_name}}</div>
                                        <div class="pt-2">{{customer.phone_no}}</div>
                                        <div class="pt-2">{{customer.email}}</div>
                                </div>
                            </div>

                            <div class="dropup show w-100 h-100" v-else>
                                <div class="border border-dark rounded d-flex h-100 justify-content-center align-items-center">
                                    <b-dropdown
                                        variant="link"
                                        no-caret
                                    >
                                    <template v-slot:button-content>
                                        <i class="fas fa-user-plus" id="user-icon" style="font-size: 23px; color: black"></i> <span style="font-size: 15px; padding-left:4px; font-weight: bold">Add Customer</span>   
                                    </template>
                                        <b-dropdown-item  @click.prevent="selectCustomer(customer)" v-for="customer in customers" :key="customer.id">{{customer.first_name}} {{customer.last_name}}</b-dropdown-item>
                                    </b-dropdown>
                                </div>
                            </div>
                    </div>

                    <!-- {{-- Invoice Details --}} -->
                    <div class="col-sm-8">        
                        <!-- {{-- Invoice No --}} -->
                        <div class="form-group row">
                            <div class="col-sm-6"></div>
                            <label class="col-sm-2 col-form-label" for="invoice_no">Invoice No</label>
                            <div class="col-sm-4">
                                <input type="text" name="invoice_no" class="form-control" :value="invoice_no">
                            </div>
                        </div>

                        <!-- {{-- Invoice Date --}} -->
                        <div class="form-group row">
                            <div class="col-sm-6">
                            </div>
                            <label class="col-sm-2 col-form-label" for="invoice_date">Invoice Date</label>        
                            <div class="input-group col-sm-4">
                                <b-form-datepicker 
                                    id="invoice_date" 
                                    v-model="invoice_date"
                                    hide-header
                                    :placeholder="invoice_date"
                                    class="form-control"
                                    no-flip
                                    :date-format-options="{ year: 'numeric', month: 'numeric', day: 'numeric' }"
                                    ></b-form-datepicker>
                            </div>
                        </div>

                        <!-- {{-- Payment Due --}} -->
                        <div class="form-group row">
                            <div class="col-sm-6">
                            </div>
                            <label class="col-sm-2 col-form-label" for="payment_due">Payment Due</label>
                            <div class="input-group col-sm-4">
                                <b-form-datepicker 
                                        id="example-datepicker" 
                                        v-model="payment_due"
                                        hide-header
                                        :placeholder="payment_due"
                                        class="form-control"
                                        no-flip
                                        :date-format-options="{ year: 'numeric', month: 'numeric', day: 'numeric' }"
                                ></b-form-datepicker>
                            </div>
                            
                        </div>
                    </div>
                
                    

                    <!-- {{-- Add items --}} -->
                    <div class="table-responsive-sm mt-5 col-sm-12">
                        <table class="table">
                            <thead class="thead-info" style="background: #dce3e9">
                                <tr class="">
                                    <th scope="col" class="w-50">Items</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Price</th>
                                    <th scope="col" class="text-right">Amount</th>
                                    <th scope="col"></th>
                                </tr>
                                
                            </thead>
                            <tbody >
                                    <template v-if="IsItemsSelected">
                                        <tr v-for="row in selected_items" :key="row.id">
                                            <td>{{row.title}}</td>
                                            <td>
                                                <input type="number" :value="row.quantity" @change="item_quantity($event, row)" id="item-input" class="form-control text-center"  min="1">
                                            </td>
                                            <td>{{selected_currency}} {{row.price.toFixed(2)}} </td>
                                            <td class="text-right">{{selected_currency}} {{calc_amount(row)}}</td>
                                            <td class="text-right" style="width:13px;">
                                                <a @click.prevent="popItem(row)" href="">
                                                    <i class="far fa-trash-alt text-danger" style="font-size:18px;"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    </template>
                                    <tr>
                                        <td class="text-center" colspan="5" >
                                            <b-dropdown
                                                variant="link"
                                                no-caret
                                            >
                                            <template v-slot:button-content>
                                                <i class="fas fa-plus-circle"></i> <span class="text-primary font-weight-bold">Add an item</span>   
                                            </template>
                                                <b-dropdown-item  @click.prevent="pushItem(item)" v-for="item in items" :key="item.id">{{item.title}}</b-dropdown-item>
                                            </b-dropdown>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-right " colspan="3">
                                              <span class="total-style">Total</span>  
                                        </td>
                                        <td class="text-right">
                                                    <b-form-select
                                                    v-model="selected_currency"
                                                    :options="currencies"
                                                    value-field="symbol"
                                                    text-field="name"
                                                    ></b-form-select>
                                                  <span class="total-style">{{selected_currency}}</span>
                                        </td>
                                        <td class="text-right" >
                                              <span class="total-style">{{total}}</span>  
                                                                                                  
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" class="pt-5 py-0">
                                            <div class="form-group">
                                                <label for="notes"> Notes</label>
                                                <textarea name="notes" v-model="notes"  class="form-control" cols="150" rows="3" placeholder="Notes Should be here" resized="none"></textarea>
                                            </div>
                                        </td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </form> 
            </div>
        </div>

        <!-- Footer -->
        <div class="accordion " id="accordion">
            <div class="card rounded shadow" >
                <div class="rounded-top h-50" style="background-color:#dce3e9;" id="headingOne">
                    <button class="border-0 h4  p-2 w-100  ml-2 row" id="collapse" style="background: #dce3e9;" data-toggle="collapse" data-target="#footer" aria-expanded="true" aria-controls="footer">
                        <span class="col-sm-10 text-left p-0 font-weight-bold">Footer</span> 
                        <span class="col-sm-2 text-right"><i class="fas fa-arrow-down"></i></span>
                    </button>
                </div>
        
                <div id="footer" class="collapse " aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <textarea name="footer" v-model="footer"  class="form-control" cols="150" rows="3" placeholder="Footer Should be here" resized="none"></textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- {{-- Save & Preview footer --}} -->
        <div class="card shadow" >
            <div class="card-body">
                <!-- {{-- Card Header --}} -->
                <div class="row">
                    <div class="col-sm-5">
                    </div>
                    <div class="col-sm-7  ">
                        <a href="" @click.prevent="Save_invoice" class="btn btn-primary float-right " id="action-btn" data-toggle="tooltip" title="Save">
                            <i class="far fa-save " id="action-icon" style="right:12%"></i>
                        </a>
                        <a href="" class="btn btn-info float-right" id="action-btn" data-toggle="tooltip" title="Preview">
                            <i class="fas fa-eye " id="action-icon"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    props:['value'],
    data(){
        const now = new Date();
        var today = now.toLocaleDateString();
        return{
            invoice_id: '',
            invoice_date: today,
            payment_due: today,
            companyDetails:{
                name : '',
                address : '',
                logo : '',
                phone_no : '',
                email : ''
            }, 
            draft_companyDetails:{
                name : '',
                address : '',
                logo : '',
                phone_no : '',
                email : ''
            },
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
            IsCustomerSelected: false, 
            IsItemsSelected: false, 
            items: [],
            selected_items:[], 
            currencies:[],
            selected_currency: 'RM',
            notes: '',
            summary: '',
            footer: '',
        };
    },
    computed: {
        total(){
            let accumulate_amount = 0; 
            if (this.selected_items === undefined || this.selected_items.length == 0) {
                return 0;
            } else{
                this.selected_items.forEach(item => {            
                    accumulate_amount += item.amount;
                });
                return accumulate_amount.toFixed(2);
            }
        }, 
        invoice_no(){
            const today = new Date();
            let day = today.getDate().toString();
            let month = (today.getMonth()+1).toString();
            let year = today.getFullYear().toString();
            let invoice_date = day+month+year;
            return invoice_date + '-' + (this.customer.id||0) + '-' + this.invoice_id;
        }
    },
    methods: {
        popItem(item){
            let index = this.selected_items.indexOf(item);
            this.selected_items.splice(index, 1);
        },
        pushItem(item){
                item.quantity = 1;
                this.selected_items.push(item);
                let index = this.items.indexOf(item);
                this.items.splice(index, 1);
                this.IsItemsSelected = true;
        },
        item_quantity(e, item){
            let index = this.selected_items.indexOf(item);
            this.selected_items[index].quantity = e.target.value;
            
        },
        calc_amount(item){
            item.amount = item.price * item.quantity;
            return item.amount.toFixed(2);
        },
        selectCustomer(selected_customer){
            this.customer = selected_customer;
            this.IsCustomerSelected = true;
        },
        uploadLogo(){
            var upload  = document.getElementById('upload').click();
        },
        setLogo(){
            let file = event.target.files[0];
                        
            var reader  = new FileReader();
            let that = this;
            reader.onloadend = function () {
                document.getElementById('img-container').style.backgroundImage = "url("+ reader.result + ")";
                document.querySelector('.img-overlay-unset').classList.replace('img-overlay-unset', 'img-overlay');
                that.companyDetails.logo = reader.result;            
                that.draft_companyDetails.logo = reader.result;
                that.updateCompanyDetails();
            }
            if(file){
                reader.readAsDataURL(file);
		    }else{
		    }
        },
        show_modal(){
            this.$refs['company-details'].show();
        },
        setCompanyName(){
            this.draft_companyDetails.name = event.target.value;
        },
        setCompanyAddress(){
            this.draft_companyDetails.address = event.target.value;
        },
        setCompanyEmail(){
                this.draft_companyDetails.email = event.target.value;
        },
        setCompanyPhone_no(){
            this.draft_companyDetails.phone_no = event.target.value;
        },
        save_modal_form(){
            let origin = this.companyDetails; 
            let updatedObject = this.draft_companyDetails;
            for(var prop in updatedObject){
                if(updatedObject[prop] === ""  ){
                    updatedObject[prop] = origin[prop];
                }
            }
            
            this.companyDetails = updatedObject;
            this.draft_companyDetails = {
                name : '',
                address : '',
                logo: '',
                phone_no : '',
                email : ''
            };
            this.updateCompanyDetails();
            this.$refs['company-details'].hide();
        },
        reset_modal_form(){
            this.$refs['company-details'].hide();
        },
        fetchCompanyDetails(){
            fetch('http://localhost:8000/api/companyDetails')
            .then(res => res.json())
            .then(data => {
                this.companyDetails = data.data;
                document.querySelector('#img-container').style.backgroundImage = "url("+ this.companyDetails.logo + ")";
                this.IslogoSet();
                })
            .catch(err => console.log(err));    
        },
        updateCompanyDetails(){
            console.log('this is update api');
            console.log(this.companyDetails);

            fetch('http://localhost:8000/api/companyDetails', {
                method: 'PUT',
                body: JSON.stringify(this.companyDetails),
                headers: {
                    'content-type': 'application/json'
                },
            })
            .then(res => res.json())
            .then(data => console.log(data.data))
            .catch(err => console.log(err));
        },
        fetchCustomers(){
            fetch('http://localhost:8000/api/customers')
            .then(res => res.json())
            .then(res => {
                this.customers = res.data;
                this.invoice_id = res.meta.invoice_id;
            })
            .catch(err => console.log(err))
        },
        fetchItems(){
            fetch('http://localhost:8000/api/items')
            .then(res => res.json())
            .then(res => {
                res.data.forEach(item => {
                    item.quantity = 0;
                    item.amount = 0;
                })
                this.items = res.data
            })
            .catch(err => console.log(err));
        },
        fetchCurrencies(){
            fetch('http://localhost:8000/api/currencies')
            .then(res => res.json())
            .then(res => this.currencies = res.data)
            .catch(err => console.log(err))
        },
        Save_invoice(){
            
            
            // invoice_item table
            let invoice_item = [];
            this.selected_items.forEach(item => {
                invoice_item.push(
                    {
                        invoice_id: this.invoice_id,
                        item_id: item.id,
                        quantity: item.quantity
                    }
                );
            });
            console.log('invoice_item');
            console.log(invoice_item);
            console.log('--------------------------------------');


            // invoices table
            let invoice = {};
            let invoice_currency = {}; 
            this.currencies.forEach(currency => {
                if(currency.symbol === this.selected_currency){
                    invoice_currency = currency;
                }
            });
            invoice =
                {
                    invoice_no: this.invoice_no,
                    invoice_date: this.invoice_date,
                    amount_due: this.total, 
                    payment_due: this.payment_due,
                    notes: this.notes, 
                    summary: this.summary,
                    status: 'draft', 
                    footer: this.footer,
                    currency_id: invoice_currency.id,
                    customer_id: this.customer.id
                };

            console.log('invoice');
            console.log(invoice);
            console.log('--------------------------------------');

            
            
            
        }, 
        IslogoSet(){
            if(this.companyDetails.logo === 'logo')
                document.querySelector('.img-overlay').classList.replace('img-overlay', 'img-overlay-unset');
            
        }
    },
    created(){
        this.fetchCompanyDetails();
        this.fetchCustomers();
        this.fetchItems();
        this.fetchCurrencies();
    },
}
</script>
<style scoped>
    #invoice-create input[value]{
        font-size:2em;
    }
    textarea{
        resize: none;
    }
    #collapse:focus{
        outline: none;
    }
    #upload{
        position: relative;
        z-index: -1
    }
    #img-container{
        background-size:contain;
        background-position: center;
        background-repeat: no-repeat;
        height: 250px;
        cursor: pointer;
        border-radius: 25px;
    }
    .img-overlay{
        display: none;
    } 
    #img-container:hover .img-overlay{
        display: block;
        border-radius: 25px;
        padding-top:20px;
        text-align: center;
        height: 100%;
        background-color: rgba(5, 5, 5, 0.2);
    }
    .img-overlay-unset{
        display: block;
        border-radius: 25px;
        padding-top:20px;
        text-align: center;
        height: 100%;
        background-color: rgba(5, 5, 5, 0.2);
    }
    #item-input{
        width: 100px;
        display: inline-block;
    }
    #btn-item{
        color: rgb(	173, 189, 203);
    }
    #btn-item:hover{
        color: rgb(	93, 121, 146);    
    }
    .card{
        width: 98%;
        margin-top: 1px;
    }
    .total-style{
        font-size: 19px;
        color: #007bff;
        padding:0px;
    }
    .custom-select{
        margin-right: 15px;
        width: 70%;
    }
    
</style>