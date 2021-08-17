require('./bootstrap');

require('alpinejs');

import Vue from 'vue';
import Welcome from './components/Welcome.vue';

// Vue.component('Welcome', require('./components/Welcome.vue')); 

import VueRouter from 'vue-router';
Vue.use(VueRouter);

//Routes
import { routes } from './routes';
import Vuetify from 'vuetify';
// import 'vuetify/dist/vuetify.min.css';

const opts = {}

export default new Vuetify(opts)

Vue.use(Vuetify);

//Register Routes
const router = new VueRouter({
    routes, 
    // mode: 'hash',
    mode: 'history',

})

const app = new Vue({
    el: '#app' ,
    components : {Welcome,},
    router ,
    Vuetify  ,
});
