<template>
    <div>
        <div id="card1" class="card shadow-sm m-8 p-8 glass flex content-center justify-center">
        <form  @submit.prevent="">
             <div class="form-control" >
                 <label for="id">id</label>
                 <input type="number" v-model="form.product_id" disabled class="input input-success input-sm ">

             </div>
                 <div class="form-control">
                   <label for="">name</label>
                 <input  type="text" v-model="form.name" disabled class="input input-sm " id="product_name">
                 </div>

                 <div class="form-control">
                     <label for="">quant</label>
                 <input type="number" v-model="form.quant" id="quant" class="input input-sm">
                 </div>

                <div class="form-control">
                <label for="">find product</label>
                 <button id="find_product" class="btn-info btn btn-sm" @click="show_products = true">find</button>
                 </div>

                <div class="form-control">
                     <label for="">parchase price</label>
                     <input type="number" class="input input-sm" v-model="form.parchase_price">
                 </div>

                <div class="form-control">
                     <label for="">notes</label>
                     <input type="text" class="input input-sm" v-model="form.notes">
                 </div>

                 <div class="form-control">
                     <button class="btn btn-success mt-4" type="button" @click="save">save</button>
                 </div>
        </form>

        </div>

        <div id="card2" class="card shadow-sm m-8 p-8 glass flex content-center justify-center">



        <table class="table table-sm w-full" v-if="stocks.length > 0">
            <thead>
                <tr>
                <th>name</th>
                <th>quant</th>

                </tr>
            </thead>
            <tbody>
                <tr v-for="stock,key in stocks" :key="key">
                <td>{{ stock.name }}</td>
                <td>{{ stock.quant }}</td>
                </tr>

            </tbody>
        </table>

        </div>

            <div id="post-modal">
            <input class="modal-toggle" type="checkbox" id="my-modal-products"  v-model="show_products">
            <div class="modal overflow-auto mt-12 mx-4">
           <div class="modal-box w-full h-full my-box">


               <product-comp mode="assign" @assignProduct="handleAssignProduct"></product-comp>

               <div class="form-control">
                    <button class="btn btn-sm btn-success " @click="show_products = false ">Close</button>
               </div>

           </div>
            </div>
            </div>

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
import  { globalMix } from '../globalMix';

export default {
    components : {productComp },
    mixins :[globalMix],
    props : ['type'], // type add or dis
    data : ()=>{
        return {
            stocks : [] ,
            form : {
                product_id : 0 ,
                name : '' ,
                quant : 1 ,
                parchase_price : 0 ,
                notes : ''
            } ,
            show_products: false,
        }
    },
    methods : {
        save(){

            this.startLoad();
            // console.log('save stock per');
            if (this.type == 'add') {
             // postitive stock permission
            } else if (this.type == 'dis'){
                if (this.form.quant>0){ // if + make it -
                    this.form.quant = this.form.quant * -1 ;
                }

            }

            // do save
            axios.post('api/stock/create' , this.form).then((res)=>{
                  this.stocks.push({name: this.form.name , quant : this.form.quant});
                  this.endLoad();
            });
        },
        handleAssignProduct(e) {
            this.form.product_id = e.id ;
            this.form.name = e.name ;
            // console.log(e);
            this.show_products = false; // close modal
        }
    }
}
</script>
