require('./bootstrap');

require('alpinejs');

import Vue from 'vue';
import Welcome from './components/Welcome.vue';
import App from './components/App.vue';

// Vue.component('Welcome', require('./components/Welcome.vue')); 

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import { routes } from './routes';
import Vuetify, {
    VCard ,
    VDatePicker,
  } from 'vuetify';

  import 'vuetify/dist/vuetify.min.css'

// import 'vuetify/dist/vuetify.min.css';


// export default new Vuetify({

//     theme: {
//       dark: false,
//     },

//   })

  const vuetifyOptions = { }
Vue.use(Vuetify);



//Register Routes
const router = new VueRouter({
    routes, 
    // mode: 'hash',
    mode: 'history',
    

})

const app = new Vue({
    el: '#app' ,

    components : {Welcome,App},
    router ,
    render: h => h(App),

    Vuetify: new Vuetify(vuetifyOptions)  ,
    VDatePicker,
});

// const app = new Vue({
//     vuetify,
//     render: h => h(App),
//     el: '#app',
// });
