import Vue from 'vue';
import router from './routes/web.js';
import frontend from './app.vue';
import bootstrapVue from 'bootstrap-vue';
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';

Vue.use(bootstrapVue);


window.App = new Vue({
    el: '#app',
    router,
    render: (createElement) => createElement(frontend)
});
