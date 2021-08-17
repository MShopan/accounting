require('./bootstrap');

require('alpinejs');

import Vue from 'vue';
import Welcome from './components/Welcome.vue';

// Vue.component('Welcome', require('./components/Welcome.vue')); 

import VueRouter from 'vue-router';
Vue.use(VueRouter);

//Routes
import { routes } from './routes';

//Register Routes
const router = new VueRouter({
    routes, 
    // mode: 'hash',
    mode: 'history',

})

const app = new Vue({
    el: '#app' ,
    components : {Welcome,},
    router
});
