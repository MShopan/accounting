require('./bootstrap');

require('alpinejs');


import Vue from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue'
import VueI18n from 'vue-i18n'
import { intersection, random } from 'lodash';


Vue.use(VueI18n)

export default new VueI18n({
    locale: 'en',

  })

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
        VueI18n,
        $preso ,
      render: h => h(App, props),
    }).$mount(el)
  },
})
