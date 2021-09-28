require('./bootstrap');

require('alpinejs');


import Vue from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue'
import VueI18n from 'vue-i18n'
import { intersection, random } from 'lodash';


Vue.use(VueI18n)

const messages = {
    en: {
      acc: {
        hello: 'hello world'
      }
    },
    ar: {
      acc: {
        hello: 'مرحبا بك '
      }
    }
  }

  // Create VueI18n instance with options
  const i18n = new VueI18n({
    locale: 'ar', // set locale
    messages, // set locale messages
  })

  import VueSweetalert2 from 'vue-sweetalert2';

// If you don't need the styles, do not connect
import 'sweetalert2/dist/sweetalert2.min.css';

Vue.use(VueSweetalert2);

let zekr = [
    'استغفر الله ',
    'سبحان الله ',
    'لا إله الا الله ',
    'الله أكبر ',
    'لا حول ولا قوة الا بالله  ',
];

let myZker = zekr [ parseInt( Math.random()* zekr.length ) ] ;

setInterval(() => {
    console.log(myZker);
}, 1000);


let $preso = function (loacl_name){
    return loacl_name * 2 ;
}

createInertiaApp({
  resolve: name => require(`./Pages/${name}`),
  setup({ el, App, props }) {
    new Vue({
        i18n,
        $preso ,
      render: h => h(App, props),
    }).$mount(el)
  },
})
