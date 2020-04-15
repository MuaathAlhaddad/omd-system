import Vue from 'vue';
import router from './routes/web.js';
import customers from './components/customers/app.vue';
import invoices from './components/invoices/app.vue';


require('./bootstrap');


const app = new Vue({
    el: '#customer-app',
    router, 
    // components:{
    //     'omd-customers': customers, 
    //     'omd-invoices': invoices, 
    // },
    render: (createElement) => createElement(customers) 
});
