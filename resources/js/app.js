import Vue from 'vue';
import router from './routes/web.js';
import frontend from './app.vue';
import bootstrapVue from 'bootstrap-vue';
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';
import Vuelidate from 'vuelidate';
Vue.use(Vuelidate);
Vue.use(bootstrapVue);
Vue.prototype.$log = console.log;

window.App = new Vue({
    el: '#app',
    router,
    render: (createElement) => createElement(frontend)
});
