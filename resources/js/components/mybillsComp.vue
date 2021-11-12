<template>
<div>
    <!-- section currnt name  -->
      <div id="currnet_section_name" class=" font-bold mx-auto w-12 p-4 shadow-md rounded-full flex justify-center items-center">{{current_section.name}}</div>
    <!-- section is grouped by partitions  -->
    <div class="my-warpper  grid grid-cols-3 gap-2 ">



   <!--## partition ## -->
   <div v-for="partition,key in sections"  :key="key"
   class="card glass m-8 mb-8 shadow-sm rounded-sm
   flex justify-center items-center
   ">

       <div class="card-title"> {{ partition.name }} </div>


      <!-- ### section ###    -->
       <button
        v-for="section,key in partition.sections"  :key="key"
        @click=" assign_current_section(section) "
        class="btn"
        :class="{ 'btn-success' : section.status == 'opened' ,
       'btn-info' : section.status == 'paied'}
       "
       >{{ section.name }}</button>


    </div>

    </div>

    <!-- page part for products  -->
    <div id="product_area">
        <button class="btn btn-success" @click="show_products=true">
            <svg xmlns="http://www.w3.org/2000/svg" class="mx-2 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path d="M13 7H7v6h6V7z" />
            <path fill-rule="evenodd" d="M7 2a1 1 0 012 0v1h2V2a1 1 0 112 0v1h2a2 2 0 012 2v2h1a1 1 0 110 2h-1v2h1a1 1 0 110 2h-1v2a2 2 0 01-2 2h-2v1a1 1 0 11-2 0v-1H9v1a1 1 0 11-2 0v-1H5a2 2 0 01-2-2v-2H2a1 1 0 110-2h1V9H2a1 1 0 010-2h1V5a2 2 0 012-2h2V2zM5 5h10v10H5V5z" clip-rule="evenodd" />
            </svg>
            {{$t('acc.add_product')}}
        </button>
        <button class="btn btn-info" @click="show_customers=true">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mx-2" viewBox="0 0 20 20" fill="currentColor">
             <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
            </svg>
            {{$t('acc.add_customer')}}
        </button>
        <button class="btn bg-red-500 rounded-full mx-2" @click="close_section()">{{$t('acc.close_section')}}</button>

     </div>

     <!-- bill header section  -->

     <div id="bill_header">
         <div class="w-full shadow stats">


  <div class="stat">
    <div class="stat-figure text-primary">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd" d="M9.243 3.03a1 1 0 01.727 1.213L9.53 6h2.94l.56-2.243a1 1 0 111.94.486L14.53 6H17a1 1 0 110 2h-2.97l-1 4H15a1 1 0 110 2h-2.47l-.56 2.242a1 1 0 11-1.94-.485L10.47 14H7.53l-.56 2.242a1 1 0 11-1.94-.485L5.47 14H3a1 1 0 110-2h2.97l1-4H5a1 1 0 110-2h2.47l.56-2.243a1 1 0 011.213-.727zM9.03 8l-1 4h2.938l1-4H9.031z" clip-rule="evenodd" />
        </svg>
    </div>
    <div class="stat-title">{{$t('acc.bill_id')}}</div>
    <div class="stat-value text-primary">{{ bill_header.bill_id }}</div>
    <div class="stat-desc"></div>
  </div>



  <div class="stat">
    <div class="stat-figure text-info">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-8 h-8 stroke-current">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
      </svg>
    </div>
    <div class="stat-title">{{$t('acc.customer')}}</div>
    <div class="stat-value text-info">  {{ bill_header.customer_name }}</div>
    <div class="stat-desc"></div>
  </div>
  <div class="stat">
    <div class="stat-figure text-info">
      <div class="avatar">
        <div class="w-16 h-16 p-1 mask mask-squircle bg-base-100">
        </div>
      </div>
    </div>
    <div class="stat-value">{{current_section.big_total}}</div>
    <div class="stat-title">{{$t('acc.total')}} $</div>
    <div class="stat-desc text-info"></div>
  </div>
</div>

        {{$t('acc.id')}} : {{ bill_header.bill_id }}
        {{$t('acc.customer')}} : {{ bill_header.customer_name }}
     </div>

     <!-- row bill footer section  -->

     <div id="bill_section" class="m-8">
         <table v-if="current_section.rows && current_section.rows.length > 0"
             class="table table-sm w-full">
             <thead>
                 <tr>
                     <th>{{$t('acc.id')}}</th>
                     <th>{{$t('acc.product')}}</th>
                     <th>{{$t('acc.quant')}}</th>
                     <th>{{$t('acc.price')}}</th>
                     <th>{{$t('acc.total')}}</th>
                 </tr>
             </thead>
             <tbody>
                 <tr v-for="row,key in current_section.rows" :key="key">
                     <td>{{key+1}}</td>
                     <td>{{row.product_data.name}}</td>
                     <td>{{row.quant}}</td>
                     <td>{{row.price}}</td>
                     <td>{{row.total}}</td>
                 </tr>

                 <!-- pure total  -->
                 <tr>
                     <td>{{$t('acc.big_total')}}</td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td>{{ current_section.big_total }}</td>
                 </tr>
             </tbody>
         </table>

         <div id="manage bill">
             <button class="btn btn-warning btn-sm"
             @click="print_bill"
             >print bill</button>
             <button id="close_bill_btn" class="btn btn-info btn-sm"
             @click="close_bill">{{$t('acc.close_bill')}}</button>
         </div>
     </div>
        <!-- product modal   -->
            <div id="product-modal">
            <input class="modal-toggle" type="checkbox" id="my-modal-products"  v-model="show_products">
            <div class="modal overflow-auto mt-12 mx-4">
           <div class="modal-box w-full h-full my-box">


               <product-comp mode="assign" :billing="true" @assignProduct="handleAssignProduct"></product-comp>

               <div class="form-control">
                    <button class="btn btn-sm btn-success " @click="show_products = false ">{{$t('acc.Close')}}</button>
               </div>

           </div>
            </div>
            </div>
    <!-- end modal  -->

            <!-- customers modal   -->
            <div id="customer-modal">
            <input class="modal-toggle" type="checkbox" id="my-modal-cusomerss"  v-model="show_customers">
            <div class="modal overflow-auto mt-12 mx-4">
           <div class="modal-box w-full h-full my-box">


               <customer-comp mode="assign"  @assignCustomer="handleAssignCustomer"></customer-comp>

               <div class="form-control">
                    <button class="btn btn-sm btn-success " @click="show_customers = false ">{{$t('acc.Close')}}</button>
               </div>

           </div>
            </div>
            </div>
    <!-- end modal  -->
</div>
</template>

<style scoped>
  .my-box{
      max-width: 85%;
      overflow: auto;
  }
</style>

<script>
import axios from 'axios';
import productComp from './productComp.vue' ;
import customerComp from './customerComp.vue' ;
import {globalMix , billReceipt} from '../globalMix';


export default {
    mixins:[
        globalMix,
    ],
    components :{
        productComp,
        customerComp,
        },
   data:()=>{
       return {
           current_section : {},
           bill_header: {} ,
           sections : {} ,
           show_products : false ,
           show_customers : false
       }
   },
   mounted(){
       this.get_sections();
       this.addEscapeEvent();

   },
   watch:{
       sections : {
           deep:true ,
           handler(_old,_new){
               this.sections.forEach( partition => {
                   partition.sections.forEach( section=>{
                        let bill_id  =  section.bill_id

                        } )
               });
           }
       },
       current_section :{deep: true ,immediate : true , handler (_old,_new){
           let big_total = 0 ;
           if (this.current_section.rows) {

               this.current_section.rows.forEach(row => big_total = big_total + row.total )
               this.current_section.big_total = big_total
           }


       }}
   },
   methods:{
       addEscapeEvent(){
           window.addEventListener('keydown',(e)=> {
               if (e.key=="Escape") {
                   this.show_products = false ;
                   this.show_customers = false ;
               }
           })
       },
       print_bill(){
         console.log('start printing');

            let bill = new billReceipt;
            bill.bill_id = this.current_section.bill_id;
            bill.bill_source = this.current_section ;
            bill.customer_name =  this.bill_header.customer_name ;

         bill.print();




       },
       close_section(){

           if (this.current_section.status == 'opened') {
              this.$swal(this.$t('acc.close_bill_first'),'','warning');

           } else if (this.current_section.status == 'paied'){
               console.log('paied');
                    let form = {  section_id : this.current_section.id };

                    axios.post('api/close_section' , form).then((res)=>{
                        this.refresh_section();
                        this.get_sections();
                        console.log('close section succcess');
                    })
           }

       },
       close_bill(){
           let form = {  section_id : this.current_section.id }
           axios.post('api/close_bill' ,form ).then((res)=>{
               this.refresh_section();
               this.get_sections();
           });
       },
      get_sections(){
          axios.get('api/mybills/sections').then((res)=>{
              this.sections = res.data ;

            //   console.log(res.data);
          })
      },
      handleAssignProduct(e){
          if (this.current_section.name == undefined ) {
              this.$swal(this.$t('acc.choise_section_first'));
          } else {

              this.add_product_to_bill(e);
          }
          // not close the model  comment the line blow
        //   this.show_products = false;
      },
      handleAssignCustomer(e){
          if (this.current_section.name == undefined ) {
              this.$swal(this.$t('acc.choise_section_first'));
          } else {

              this.add_customer_to_bill(e);
          }
      },
      add_customer_to_bill(e){
          let form = {
              section_id : this.current_section.id  ,
              customer : e ,
           } ;
           axios.post('api/assign_customer_to_bill_id', form ).then((res)=>{
                this.show_customers = false;
                this.get_bill_header();
           })
      },
      add_product_to_bill(e){
          if (this.current_section.status == 'closed' && this.current_section.bill_id == -1) {
              // open the section and get new bill id form db
             //    let new_bill_id = await axios.get('api/bill_counter');
               this.add_product_with_new_bill_id(e);

          } else if ( this.current_section.status == 'paied' ){

                this.confirm_close_section(e);

          } else if (this.current_section.status == 'opened' ){
               // add produt to bill id in the temp footer
               this.add_product_to_bill_id(e);
          }
      },
      confirm_close_section(e){
                    this.$swal.fire({
                    title:this.$t('acc.sure_close_section'),
                    text: "",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: this.$t('acc.yes') ,
                    cancelButtonText: this.$t('acc.no')
                    }).then((result) => {
                    if (result.isConfirmed) {
                        this.add_product_with_new_bill_id(e);

                    }
                    })
      },
      add_product_with_new_bill_id(e){

          let form = {section_id : 0 , product : Object , partition_id : 0 } ;
          form.section_id = this.current_section.id;
          form.partition_id = this.current_section.partition_id;
          form.product = e ;
          console.log(`form is : ${form}`);
          console.log(form);
          axios.post('api/add_product_with_new_bill_id' , form ).then(()=>{

              this.refresh_section();
              this.get_sections();
          }  );

      },
      add_product_to_bill_id(e){

          let form = {section_id : 0 , product : Object , partition_id : 0 } ;
          form.section_id = this.current_section.id;
          form.partition_id = this.current_section.partition_id;
          form.product = e ;
          console.log(`form is : ${form}`);
          console.log(form);
          axios.post('api/add_product_to_bill_id' , form ).then(()=>{

              this.refresh_section();
          }  );

      },
      refresh_section(){
          axios.post('api/refresh_section' , this.current_section ).then( res =>{
              this.current_section = res.data.section ;
              // assign section first like above
              this.current_section.rows = res.data.rows ;
           }
          );

          this.get_bill_header();
      },
      get_bill_header(){
         let form = {
             section_id : this.current_section.id ,
         };
         axios.post('api/get_bill_header' , form ).then(
             (res)=>{
                this.bill_header = res.data ;
                console.log('get header success is donme ');
             }
         );
      },
      assign_current_section(section){
         this.current_section = section ;
         this.refresh_section();
         console.log(section);
      }
   }
}
</script>
