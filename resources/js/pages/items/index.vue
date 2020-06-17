<template>
    <div>
        <b-alert
                id="alert"
                style="width: 98%;"
                :show="alert_sec"
                dismissible
                :variant="alert_color"
                @dismissed="alert_sec=0"
                @dismiss-count-down="countDown"
            >
            {{alert_message}}
        </b-alert>
        <div class="card">
            <div class="card-body">
                 <!-- Card Header (Title & Create btn) -->
                <div class="row">
                        <div class="col-sm-4">
                            <h4 class="card-title font-weight-bold">
                                Products & Services
                            </h4>
                        </div> 

                        <!-- filler -->
                        <div class="col-sm-4 align-self-end">
                        </div>

                        <!-- Add a Product or Service -->
                        <div class=" col-sm-4">
                            <div class="btn-toolbar float-right">
                                <b-button id="add-item" @click="show_modal" variant="primary" class="btn btn-primary">Add a Product or Service</b-button>
                                <b-modal ref="add-item" hide-footer title="Add a Product or Service">
                                        
                                        <form @submit.prevent="createItem" >
                                            <!-- Title -->
                                            <div class="form-group row ">
                                                <label for="title" class="col-sm-3 col-form-label">Title</label>
                                                <div class="col-sm-9">
                                                    <input type="text"  class="form-control" v-model="item.title" placeholder="e.g. Web Development ...">
                                                </div>
                                            </div>
                                                <!-- Description -->
                                            <div class="form-group row">
                                                <label for="description" class="col-sm-3 col-form-label">Description</label>
                                                    <div class="col-sm-9">
                                                        <textarea  class="form-control" v-model="item.desc"  cols="30" rows="5" style="resize: none;"></textarea>
                                                    </div>
                                            </div>

                                            <!-- Price -->
                                            <div class="form-group row">
                                                <label for="phone_no" class="col-sm-3 col-form-label"> Price</label>
                                                <div class="input-group col-sm-5">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">RM</span>
                                                    </div>
                                                    <input type="number" class="form-control" v-model="item.price" placeholder="2500">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">.00</span>
                                                    </div>
                                                </div>
                                            </div>


                                            <!-- Type (Service | Product) -->
                                            <div class="form-group row">
                                                    <label for="type" class="col-sm-3 col-form-label">Type</label>
                                                    <div class="input-group col-sm-9 align-items-center"> 
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="product" value="1" v-model="item.item_categories_id" class="custom-control-input">
                                                        <label class="custom-control-label" for="product">Product </label>
                                                        </div>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="service" value="2" v-model="item.item_categories_id" class="custom-control-input">
                                                        <label class="custom-control-label" for="service">Service </label>
                                                        </div>
                                                    </div>
                                            </div>

                                            <b-button variant="outline-success" block class="mt-5" type="submit">Save Changes</b-button>
                                            <b-button variant="outline-danger" block class="mt-2" @click="reset_modal_form">Cancel</b-button>
                                        </form>
                                </b-modal>








                            </div>
                        </div>
                </div>

                <!-- Search Bar -->
                <div class="row">
                    <b-input-group class=" w-50 m-auto ">                        
                        <b-form-input
                        placeholder="Search for Product or Service"
                        v-model="filter"
                        class="rounded-pill searchbar"
                        >
                        </b-form-input>
                    </b-input-group>
                </div>

                <!-- items lists -->
                <div class="row">
                    <div class="col">
                        <b-table
                            show-empty 
                            :filter="filter"
                            @filtered="on_filtered"
                            id="items-table" 
                            :sort-by.sync="sort_by"
                            :sort-desc.sync="sort_desc"
                            :items="items"  
                            :fields="fields"
                            :per-page="per_page" 
                            :current-page="current_page" 
                            responsive
                            hover
                            head-variant="light"
                            class="mt-4"
                        >
                            <template v-slot:cell(title)="data">
                                <div>
                                    {{data.item.title}} <br>
                                    <small>{{data.item.desc}}</small>
                                </div>
                            </template>
                            <template v-slot:cell(price)="data">
                                <div>
                                    RM {{data.item.price}}
                                </div>
                            </template>
                            <template v-slot:cell(actions)="data">
                                        
                                        <div class="btn-group">
                                            <!-- {{-- EDIT --}} -->
                                            <!-- Button trigger modal  -->
                                            <button type="button"   id="edit-btn"  data-toggle="modal" :data-target="'#'+data.item.title.replace(/\s/g, '')+data.item.id" title="Edit Item">
                                                <i class="fas fa-edit"></i>                                                    
                                            </button>
                                                <!-- Modal -->
                                                <div class="modal fade" :id="data.item.title.replace(/\s/g, '')+data.item.id" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLongTitle">Edit Item</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>

                                                            <div class="modal-body">
                                                                <!-- Title -->
                                                                <div class="form-group row">
                                                                    <label for="title" class="col-sm-3 col-form-label">Title</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control" v-model="data.item.title">
                                                                    </div>
                                                                </div>

                                                                     <!-- Description -->
                                                                <div class="form-group row">
                                                                    <label for="description" class="col-sm-3 col-form-label">Description</label>
                                                                        <div class="col-sm-9">
                                                                            <textarea  class="form-control" v-model="data.item.desc"  cols="30" rows="5" style="resize: none;"></textarea>
                                                                        </div>
                                                                </div>

                                                                <!-- Price -->
                                                                <div class="form-group row">
                                                                    <label for="phone_no" class="col-sm-3 col-form-label"> Price</label>
                                                                    <div class="col-sm-5 input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">RM</span>
                                                                        </div>
                                                                        <input type="number" class="form-control" v-model="data.item.price">
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text">.00</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                <button class="btn btn-primary" type="button" @click="UpdateItem(data.item)" data-dismiss="modal">Save changes</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            <!-- {{-- DELETE --}} -->
                                            <button  v-on:click="DeleteItem(data.item)" data-toggle="tooltip" data-placement="top" title="Delete Item" id="delete-btn">
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
                            <small class="text-muted">     Total Products and Services Available <strong>{{rows}}</strong></small>  
                    </div>

                    <div class="col-sm-4">
                        <b-pagination
                            class=" m-auto justify-content-center"
                            pills
                            :per-page="per_page"
                            :total-rows="rows"
                            v-model="current_page"
                            aria-controls="#items-table"
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
    data() {
        return {
            fields:[
                {key: 'title', sortable:true},
                // {key: 'desc', label: 'Description', sortable:true},
                {key: 'price', sortable:true},
                {key:'created_at', sortable: true},
                {key:'actions', sortable: false},
            ],
            items: [],
            item: {
                title: '', 
                desc: '',
                price: 0,
                item_categories_id: 1, 
                created_at: '', 
                updated_at: '',
            }, 
            alert_sec: 0, 
            alert_duration: 5,
            alert_message: '', 
            alert_color: '',
            current_page:1,
            per_page: 10,
            sort_by: 'created_at',
            sort_desc: false,
            filter: null,
            filter_on:[],
        }
    },
    computed: {
        rows(){
            return this.items.length;
        }, 
        now(){
            const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
                                "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
            const today = new Date();
            let day = today.getDate().toString();
            let month = (today.getMonth()+1).toString();
            let year = today.getFullYear().toString();
            return year+'-'+month+'-'+day;
        },
    },
    methods: {
        show_modal(){
            this.$refs['add-item'].show();
        },
        createItem(){
            this.$refs['add-item'].hide();
            this.item.created_at = this.now;
            fetch('http://localhost:8000/api/items', {
                method: 'POST', 
                body: JSON.stringify(this.item), 
                headers: {
                    'content-type': 'application/json'
                }
            })
            .then(res => res.json())
            .then(res => {
                console.log(res.data);
                this.items.push(res.data);
                this.item = {};
                this.alert_message = 'Product/Service Created Successfully';
                this.alert_color = 'success';
                this.show_alert();
            })
            .catch(e => console.log(e));
        },
        reset_modal_form(){
            this.item = {};
            this.$refs['add-item'].hide();
        },
        show_alert(){
            this.alert_sec = this.alert_duration;
        },
        countDown(alert_sec){
            this.alert_sec = alert_sec;
        },
        fetchItems(){
            fetch('http://localhost:8000/api/items')
            .then(res => res.json())
            .then(res => {
                this.items = res.data
                console.log(this.items);
                this.item.id = res.meta.id;
            })
            .catch(e => console.log(e));
        },
        on_filtered(filtered_items){
            this.rows
        },
        UpdateItem(item){
            item.updated_at = this.now;
            fetch(`http://localhost:8000/api/items/${item.id}`, {
                method: 'PUT', 
                body: JSON.stringify(item),
                headers: {
                    'content-type': 'application/json'
                }
            })
            .then(res => res.json())
            .then(res => {
                console.log(res);

                this.alert_message = 'Product/Service Updated Successfully';
                this.alert_color = 'success';
                this.show_alert();
            })
            .catch(e => console.log(e));
        },
        DeleteItem(item){
             fetch(`http://localhost:8000/api/items/${item.id}`, {
                method: 'DELETE'
            })
            .then(res => res.json())
            .then(res => {
                console.log(res.data);
                var index = this.items.indexOf(item);
                this.$delete(this.items, index);
                this.alert_message = 'Product/Service Deleted Successfully';
                this.alert_color = 'success';
                this.show_alert();
            })
            .catch(e => console.log(e));
        }

    },
    created(){
        this.fetchItems();
    }
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
    #edit-btn{
        border: none;
        background-color: inherit;
    }
    #edit-btn:hover{
        color:blue;
    }
    #edit-btn:focus{
        border: none;
        background-color: inherit;
    }
    #delete-btn{
        border: none;
        background-color: inherit;
    }
    #delete-btn:hover{
        color: red;
    }
    #delete-btn:focus{
        border: none;
        background-color: inherit;
    }
</style>