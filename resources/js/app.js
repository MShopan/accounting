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
        welcome: 'wlecome to our accounting system',
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
        email: 'email',
        treat: 'treat',

        home : 'Home',
        posts : 'Posts',
        users : 'Users',
        customers : 'customers',
        category : 'category',
        partitions : 'partitions',
        stock_add : 'stock_add',
        stock_dis : 'stock_dis',
        my_bills : 'my_bills',
        products : 'products',
        product : 'product' ,

        coad : 'coad',
        Save : 'Save',
        Close : 'Close',
        sure : 'Are you sure?',
        refuse : 'no',
        yes : 'yes',

        no : 'no',  // now here is No.

        coad: 'coad',
        price: 'price',
        popular: 'popular',
        stock: 'stock',
        min_stock: 'min stock',
        created_at: 'created at',
        updated_at: 'updated at',
        notes : 'notes',
        set_old_prices : 'set old prices',
        parchase_price : 'Parchase Price',
        find_product : 'Find Product',
        quant : 'quantity' ,
        customer : 'Customer' ,
        add_customer : 'Add Customer' ,
        add_product : 'Add Product' ,
        close_bill : 'Close Bill' ,
        close_section : 'Close Section' ,
        close_bill_first : 'Close Bill first ',
        enter_quant : 'Enter Quantity' ,
        ok : 'ok',
        choise_section_first : 'Choise section first',
        sure_close_section : 'Are you sure to close section ?' ,

        big_total : 'Total' ,
        pure_total : 'Pure Total' ,
        discount : 'Discount' ,
        view_bills : 'View Bills' ,








      }
    },
    ar: {
      acc: {
        welcome: 'مرحبا بك في برنامجنا المحاسبي',
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
        email: 'البريد الإلكتروني',
        treat: 'المعاملة',


        home : 'الرئيسية',
        posts : 'المنشورات ',
        users : 'المستخدمين',
        customers : 'العملاء',
        category : 'السمات ',
        partitions : 'الأجزاء',
        stock_add : 'إذن إضافة ',
        stock_dis : 'إذن خصم',
        my_bills : 'الفواتير',
        products : 'المنتجات',
        product : 'المنتج' ,

        coad : 'الكود',
        Save : 'حفظ',
        Close : 'إغلاق',

        sure : 'هل أنت متأكد ؟',
        refuse : 'لا',
        yes : 'نعم',

        no : 'رقم' ,// no here is No.

        coad: 'الكود',
        price: 'السعر',
        popular: 'المشهورة',
        stock: 'الرصيد',
        min_stock: 'أقل رصيد',
        created_at: 'تاريخ الإنشاء',
        updated_at: 'تاريخ التحديث',
        notes : 'الملاحظات',
        set_old_prices : 'اضافة الاسعار القديمة',

        parchase_price : 'سعر الشراء',
        find_product : 'بحث المنتجات',
        quant : 'الكمية' ,
        customer : 'العميل' ,
        add_customer : 'إضافة عميل' ,
        add_product : 'إضافة منتج' ,
        close_bill : 'إغلاق الفاتورة' ,
        close_section : 'إغلاق القسم' ,
        close_bill_first : 'أغلق الفاتورة أولاً',
        enter_quant : 'أدخل الكمية  ' ,
        ok : 'موافق' ,
        choise_section_first : 'اختر القسم أولاً ',
        sure_close_section : 'هل أنت متأكد من أغلاق القسم ؟ ' ,

        big_total : 'المجموع' ,
        pure_total : 'الصافي' ,
        discount : 'الخصم' ,
        view_bills : 'عرض الفواتير' ,









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
