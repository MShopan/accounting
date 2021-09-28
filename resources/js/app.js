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
        hello: 'hello world',
        search: 'search',
        id: 'id',
        name: 'name',
        mobile: 'mobile',
        tools: 'tools',
        add: 'Add',
        edit: 'Edit',
        delete: 'Delete',
        assign: 'Assign',
        next: 'Next',
        previous: 'Previous',

        home : 'Home',
        posts : 'Posts',
        users : 'Users',
        customers : 'customers',
        category : 'category',
        partitions : 'partitions',
        stock_add : 'stock_add',
        stock_dis : 'stock_dis',
        my_bills : 'my_bills',
        products : 'products'

      }
    },
    ar: {
      acc: {
        hello: 'مرحبا بك ',
        search: 'بحث',
        id: 'م',
        name: 'الاسم',
        mobile: 'الموبايل',
        tools: 'الأدوات',
        add: 'إضافة',
        edit: 'تعديل',
        delete: 'حذف',
        assign: 'اسناد',
        next: 'التالي',
        previous: 'السابق',

        home : 'الرئيسية',
        posts : 'المنشورات ',
        users : 'المستخدمسن',
        customers : 'العملاء',
        category : 'السمات ',
        partitions : 'الأجزاء',
        stock_add : 'إذن إضافة ',
        stock_dis : 'إذن خصم',
        my_bills : 'الفواتير',
        products : 'المنتجات'



      }
    }
  }

  // Create VueI18n instance with options
  const i18n = new VueI18n({
    locale: localStorage.getItem('lang') || 'en', // set locale
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
