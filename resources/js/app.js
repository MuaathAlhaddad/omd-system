import Vue from 'vue';
import router from './routes/web.js';
import customers from './components/customers/app.vue';

require('./bootstrap');


const app = new Vue({
    el: '#customer-app',
    router, 
    render: (createElement) => createElement(customers) 
});
