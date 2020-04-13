<template>
<div class="card">
    <div class="card-body">

        <!-- {{-- Table Heading --}} -->
        <div class="row">
            <div class="col-sm-10">
                <h4 class="card-title mb-0">
                    Customer Profile
                </h4>
            </div>
        </div>
        <hr>

        <!-- {{-- Table Content --}} -->
        <div class="row">
            <div class="col-sm-10">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <tr>
                            <th>ID</th>
                            <td>{{customer.id}}</td>
                        </tr>
                        
                        <tr>
                            <th>First Name</th>
                            <td>{{customer.first_name}}</td>
                        </tr>

                        <tr>
                            <th>Last Name</th>
                            <td>{{customer.last_name}}</td>
                        </tr>

                        <tr>
                            <th>Email</th>
                            <td>{{customer.email}}</td>
                        </tr>

                        <tr>
                            <th>Phone No</th>
                            <td>{{customer.phone_no}}</td>
                        </tr>

                        <tr>
                            <th>Address</th>
                            <td>{{customer.address}}</td>
                        </tr>

                        <tr>
                            <th>Created At</th>
                            <td>{{customer.created_at}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <!-- {{-- Table footer --}} -->
        <div class="clearfix">
            <router-link to="/customers" class="btn btn-primary float-left">Back</router-link>
            <button  v-on:click="DeleteCustomer(customer.id)" data-toggle="tooltip" data-placement="top" title="Delete Customer" class="btn btn-danger float-right">
                    Delete        
            </button>
        </div>
        
    </div>
</div>
</template>
<script>
export default {
    data() {
        return {
            customer_id: this.$route.params.id, 
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
        }
    },
    created() {
        this.fetchCustomer(this.customer_id);
    },
    methods: {
        fetchCustomer(id){
            fetch(`http://localhost:8000/api/customers/${id}`)
            .then(res => res.json())
            .then(res => {
                this.customer.id = res.data.id;
                this.customer.first_name = res.data.first_name;
                this.customer.last_name = res.data.last_name;
                this.customer.phone_no = res.data.phone_no;
                this.customer.address = res.data.address;
                this.customer.email = res.data.email;
                this.customer.created_at = res.data.created_at;
                this.customer.updated_at = res.data.updated_at;
                
                console.log(res.data);
            })
            .catch( error => console.log(error));
        }, 
        DeleteCustomer(customer_id){
                fetch(`http://localhost:8000/api/customers/${customer_id}`, {
                    method: 'Delete'
                })
                .then(res => res.json())
                .then(data => {
                    alert('Customer Deleted');
                    this.$router.push('/customers');
                })
                .catch( error => console.log(error));
        }
    } 
}
</script>