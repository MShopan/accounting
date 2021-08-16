require('./bootstrap');

require('alpinejs');

import Vue from 'vue';
import Welcome from './components/Welcome.vue';

// Vue.component('Welcome', require('./components/Welcome.vue')); 

const app = new Vue({
    el: '#app' ,
    components : {Welcome,}
});
