<template>
        <b-modal :id="ModalID" title="Customer Modal" @hidden="resetModal" hide-footer>
                     <b-alert id="alert" style="width: 100%;" :show="alert_sec" dismissible :variant="alert_color"
                                @dismissed="alert_sec=0" @dismiss-count-down="countDown">
                        {{alert_message}}
                    </b-alert>
                    <b-form  @submit.prevent="onSubmit($v, $event)">
                        
                        <div class="row">
                            <!-- first_name -->
                            <div class="col">
                                <b-form-group id="first-name-group" label="First Name" label-for="first-name">
                                    <b-form-input id="first-name" type="text" :value="customer.first_name"
                                                :state="first_nameValidate" @change="setFirstName($event)" required>
                                    </b-form-input>
                                    <b-form-invalid-feedback :state="first_nameValidate">First Name is required and must be 3-5 character long.</b-form-invalid-feedback>
                                </b-form-group>
                            </div>

                            <div class="col">
                                <!-- Last_name -->
                                <b-form-group id="last-name-group" label="Last Name" label-for="last-name">
                                    <b-form-input id="last_name" :value="customer.last_name" :state="last_nameValidate"
                                                @change="setLastName($event)" type="text" required>
                                    </b-form-input>
                                    <b-form-invalid-feedback :state="last_nameValidate">Last Name is required and must be 3-5 character long.</b-form-invalid-feedback>
                                </b-form-group>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Email -->
                            <div class="col">
                                <b-form-group id="email-group" label="Email" label-for="email">
                                    <b-form-input id="email" :state="emailValidate" :value="customer.email"
                                                    @change="setEmail($event)" type="email" required>
                                    </b-form-input>
                                    <b-form-invalid-feedback :state="emailValidate">Invalid Email.</b-form-invalid-feedback>
                                </b-form-group>
                            </div>

                            <!-- phone_no -->
                            <div class="col">
                                <b-form-group id="phone-no-group" label="Phone No" label-for="phone-no" description="Format: 1234567890">
                                    <b-input-group prepend="+60">
                                        <b-input id="phone-no" :value="customer.phone_no" :state="phone_noValidate"
                                            @change="setPhoneNo($event)" type="number" placeholder="1234567890" required>
                                        </b-input>
                                    </b-input-group>
                                    <b-form-invalid-feedback :state="phone_noValidate">Invalid phone_no.</b-form-invalid-feedback>
                                </b-form-group>
                            </div>
                        </div>

                        <!-- address  -->
                        <b-form-group id="address-group" label="Address" label-for="address">
                            <b-form-textarea id="address" :value="customer.address" :state="addressValidate"
                                @change="setAddress($event)" type="text" required rows="3" style="resize: none">
                            </b-form-textarea>
                            <b-form-invalid-feedback :state="addressValidate">Address is required and must be 3-5 character long.</b-form-invalid-feedback>
                        </b-form-group>

                        <hr style="margin-top: 2rem; margin-bottom: 1rem;">

                        <div class="row justify-content-center">
                            <b-button variant="success"  class="mr-1" type="submit">Save Changes</b-button>
                            <b-button variant="danger" class="ml-1" @click="$bvModal.hide(ModalID)">Cancel</b-button>
                        </div>
                    </b-form>

        </b-modal>
</template>

<script>
import { required, email, numeric, minLength, maxLength} from 'vuelidate/lib/validators';
export default {
    props: ['selectedCustomer', 'modalType', 'customers'], 
    validations: {
            customer: {
                    first_name: {
                        required,
                        minLen: minLength(3), 
                        maxLen: maxLength(12)
                    },
                    last_name: {
                        required,
                        minLen: minLength(3), 
                        maxLen: maxLength(12)
                    },
                    phone_no: {
                        required,
                        minLen: minLength(7), 
                        numeric,
                        maxLen: maxLength(15)
                    },
                    address: {
                        required,
                        minLen: minLength(7), 
                        maxLen: maxLength(95)
                    },
                    email: {
                        required,
                        email,
                        isUnique: function (val) {
                            if(val === '') return true;
                            else if(val === this.currentEmail) return true;
                            return axios.get(`api/validateEmail/${val}`)
                            .then(res => {
                                return res.data.unique;
                            })
                            
                        }
                    }
            }
    }, 
    data() {
        return {
            currentEmail: '',
            alert_sec: 0,
            alert_duration: 5,
            alert_message: '',
            alert_color: '', 
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
            customer_default:{
                first_name: [],
                last_name: [],
                phone_no: [],
                address: [],
                email: [],
            },
        };
    },
    watch: {
        'customer.first_name'(newVal, oldVal){
            if(this.modalType === 'edit'){
                this.customer_default.first_name.push(oldVal);
            }
        },
        'customer.last_name'(newVal, oldVal){
            if(this.modalType === 'edit'){
            this.customer_default.last_name.push(oldVal);
            }
        },
        'customer.phone_no'(newVal, oldVal){
            if(this.modalType === 'edit'){
            this.customer_default.phone_no.push(oldVal);
            }
        },
        'customer.address'(newVal, oldVal){
            if(this.modalType === 'edit'){
            this.customer_default.address.push(oldVal);
            }
        },
        'customer.email'(newVal, oldVal){
            if(this.modalType === 'edit'){
            this.customer_default.email.push(oldVal);
            }
        },
    },
    computed: {
        ModalID(){
            if(this.modalType === 'create'){
                return 'customerModal'
            }else{
                return this.customer.first_name.replace(/\s/g, '')+this.customer.id;
            }
        },
        now(){
            const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
                                "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
            const today = new Date();
            let day = today.getDate().toString();
            let month = (today.getMonth()+1).toString();
            let year = today.getFullYear().toString();
            return year+'-'+month+'-'+ day;
        },
        first_nameValidate(){
            if(this.$v.customer.first_name.$dirty) {
                return !this.$v.customer.first_name.$anyError;
            } else return  null; 
        },
        last_nameValidate(){
            if(this.$v.customer.last_name.$dirty) {
                return !this.$v.customer.last_name.$anyError;
            } else  return  null; 
        },
        emailValidate(){
            if(this.$v.customer.email.$dirty) {
                return !this.$v.customer.email.$anyError;
            } else  return  null;
        },
        phone_noValidate(){
            if(this.$v.customer.phone_no.$dirty) {
                return !this.$v.customer.phone_no.$anyError;
            } else  return  null;
        },
        addressValidate(){
            if(this.$v.customer.address.$dirty) {
                return !this.$v.customer.address.$anyError;
            } else  return  null;
        },
    },
    methods: {
        setFirstName(e){
            this.customer.first_name = e;
            this.$v.customer.first_name.$touch();
        },
        setLastName(e){
            this.customer.last_name = e;
            this.$v.customer.last_name.$touch();
        },
        setEmail(e){
            this.customer.email = e;
            this.$v.customer.email.$touch();
        },
        setPhoneNo(e){
            this.customer.phone_no = e;
            this.$v.customer.phone_no.$touch();
        },
        setAddress(e){
            this.customer.address = e;
            this.$v.customer.address.$touch();
        },
        resetModal() {
            this.$nextTick(() => { 
                this.$v.$reset(); 
            });
            if(this.modalType === 'create'){
                this.customer = {
                        id: '', 
                        first_name: '',
                        last_name: '',
                        phone_no: '',
                        address: '',
                        email: '',
                        created_at: '',
                        updated_at: '',
                };
            }
           
            if(this.alert_color != 'success'){
                if(this.customer_default.first_name[1] != undefined){
                    this.customer.first_name = this.customer_default.first_name[1];
                } 
                if(this.customer_default.last_name[1] != undefined){
                    this.customer.last_name = this.customer_default.last_name[1];
                } 
                if(this.customer_default.phone_no[1] != undefined){
                    this.customer.phone_no = this.customer_default.phone_no[1];
                } 
                if(this.customer_default.address[1] != undefined){
                    this.customer.address = this.customer_default.address[1];
                } 
                if(this.customer_default.email[1] != undefined){
                    this.customer.email = this.customer_default.email[1];
                }
            }
        },
        onSubmit(v, e) {
            v.customer.$touch();
            if(this.$v.customer.$anyError){
                this.alert_message = 'Correct the inputs Please';
                this.alert_color = 'danger';
                this.show_alert();
            }else {
                this.customer.first_name = this.customer.first_name.charAt(0).toUpperCase() + this.customer.first_name.slice(1);
                // CREATE CUSTOMER
                if(this.modalType === 'create') {
                    this.customer.created_at = this.now;
                    let last_index = this.customers.length - 1;
                    let last_customer  = this.customers[last_index];
                    this.customer.id = last_customer.id + 1;
                    fetch(`api/customers`, {
                        method: 'POST',
                        body:  JSON.stringify(this.customer),
                        headers: {'content-type' : 'application/json'},
                    })
                    .then(res => res.json())
                    .then(res => {
                        this.$nextTick( () => {
                            this.$v.$reset();
                        } );
                        this.$bvModal.hide(this.ModalID);
                        this.$emit('create-customer', this.customer);
                        this.customer = {
                                id: '', 
                                first_name: '',
                                last_name: '',
                                phone_no: '',
                                address: '',
                                email: '',
                                created_at: '',
                                updated_at: '',
                        };
                    })
                    .catch(e => console.log(e));
                } else{
                    // UPDATE CUSTOMER
                    this.customer.updated_at = this.now;
                    fetch(`api/customers/${this.customer.id}`, {
                        method: 'put',
                        body: JSON.stringify(this.customer), 
                        headers:{
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                            this.$nextTick(() => {
                                this.$v.$reset();
                                this.$bvModal.hide(this.ModalID);
                            });
                           this.$emit('update-customer', this.selectedCustomer);
                           this.alert_color = 'success';
                           this.alert_message = 'Customer Updated Successfully';
    
    
                    })
                    .catch(error => console.log(error));
                }
            }
        },
        show_alert(){
            this.alert_sec = this.alert_duration;
        },
        countDown(alert_sec){
            this.alert_sec = alert_sec;
        },
    },
    created(){
        if(this.modalType === 'edit'){
            this.customer = this.$props.selectedCustomer;
            this.currentEmail = this.$props.selectedCustomer.email;
        } 
    }
    
}
</script>