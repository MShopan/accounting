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
        <button class="btn btn-success" @click="show_products=true">add product</button>
        <button class="btn btn-info" @click="show_customers=true">add customer</button>

     </div>

     <!-- bill header section  -->

     <div id="bill_header">
        id : {{ bill_header.bill_id }}
        customer : {{ bill_header.customer_name }}
     </div>

     <!-- row bill footer section  -->

     <div id="bill_section" class="m-8">
         <table v-if="current_section.rows && current_section.rows.length > 0"
             class="table table-sm w-full">
             <thead>
                 <tr>
                     <th>id</th>
                     <th>product</th>
                     <th>quantity</th>
                     <th>price</th>
                     <th>total</th>
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
                     <td>big total</td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td>{{ current_section.big_total }}</td>
                 </tr>
             </tbody>
         </table>
         <div id="closse_bill">
             <button id="close_bill_btn" class="btn btn-info btn-sm">close bill</button>
         </div>
     </div>
        <!-- product modal   -->
            <div id="product-modal">
            <input class="modal-toggle" type="checkbox" id="my-modal-products"  v-model="show_products">
            <div class="modal overflow-auto mt-12 mx-4">
           <div class="modal-box w-full h-full my-box">


               <product-comp mode="assign" :billing="true" @assignProduct="handleAssignProduct"></product-comp>

               <div class="form-control">
                    <button class="btn btn-sm btn-success " @click="show_products = false ">Close</button>
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
                    <button class="btn btn-sm btn-success " @click="show_customers = false ">Close</button>
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

export default {
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
      get_sections(){
          axios.get('api/mybills/sections').then((res)=>{
              this.sections = res.data ;

            //   console.log(res.data);
          })
      },
      handleAssignProduct(e){
          if (this.current_section.name == undefined ) {
              this.$swal('choise section first');
          } else {

              this.add_product_to_bill(e);
          }
          // not close the model  comment the line blow
        //   this.show_products = false;
      },
      handleAssignCustomer(e){
          if (this.current_section.name == undefined ) {
              this.$swal('choise section first');
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
                this.$swal(res.data);
                this.show_customers = false;
           })
      },
      add_product_to_bill(e){
          if (this.current_section.bill_id == -1) {
              // open the section and get new bill id form db
             //    let new_bill_id = await axios.get('api/bill_counter');
               this.add_product_with_new_bill_id(e);

          } else if ( this.current_section.bill_id > 0 ){
              // add produt to bill id in the temp footer
              this.add_product_to_bill_id(e);
          }
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
            //    console.log(res.data);
              this.current_section.rows = res.data ;
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
