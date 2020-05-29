import VueRouter from 'vue-router';
import Vue from 'vue';
import customers_index from '../pages/customers/index.vue';
import customers_show from '../pages/customers/show.vue';
import invoices_index from '../pages/invoices/index.vue';
import invoices_create from '../pages/invoices/create.vue';

Vue.use(VueRouter);

export default new VueRouter({
    routes:[
        {path:'/customers', name: 'customers-index', component: customers_index},
        {path:'/customers/:id', name: 'customers-show', component: customers_show},
        {path:'/invoices', name: 'invoices-index', component: invoices_index},
        {path:'/invoices/create', name: 'invoices-create', component: invoices_create},
    ],
    mode: 'history',
})