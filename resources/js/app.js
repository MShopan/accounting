require('./bootstrap');

require('alpinejs');

import Vue from 'vue';
import Welcome from './components/Welcome.vue';
import App from './components/App.vue';


import VueRouter from 'vue-router';
Vue.use(VueRouter);

import { routes } from './routes';




//Register Routes
const router = new VueRouter({
    routes, 
    // mode: 'hash',
    mode: 'history',
    

})

// vuesax
import Vuesax from 'vuesax'

import 'vuesax/dist/vuesax.css' //Vuesax styles
Vue.use(Vuesax, {
  // options here
})

const app = new Vue({
    el: '#app' ,

    components : {Welcome,App},
    router ,
    render: h => h(App),


});


