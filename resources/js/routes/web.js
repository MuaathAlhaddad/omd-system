import VueRouter from 'vue-router';
import Vue from 'vue';
import index from '../components/customers/index.vue';
import show from '../components/customers/show.vue';

Vue.use(VueRouter);

export default new VueRouter({
    routes:[
        {path:'/customers', name: 'customers-index', component: index},
        {path:'/customers/:id', name: 'customers-show', component: show},
        // {path:'/invoices/create', name: 'invoices-create', component: invoice-create},
    ],
    mode: 'history',
})