<template>
          <div class="">
            <input class="modal-toggle" type="checkbox" id="my-modal-2"  v-model="show">
            <div class="modal overflow-auto pt-40">
           <div class="modal-box ">


             <form @submit.prevent="save" class="pt-16">
                <div class="form-control" >

                      <label class="label">
                            <span class="label-text">Name</span>
                        </label>

                    <input  type="text" class="input input-success " v-model="form.name" >

                      <error-label v-if="errors && errors.name" >
                          {{errors.name[0]}}
                      </error-label>

                </div>
                <div class="form-control" >

                      <label class="label">
                            <span class="label-text">coad</span>
                        </label>

                    <input  type="text" class="input input-success " v-model="form.coad" >

                      <error-label v-if="errors && errors.coad" >
                          {{errors.coad[0]}}
                      </error-label>

                </div>


                <div class="form-control"  >

                      <label class="label">
                            <span class="label-text">category</span>
                        </label>

                    <select class="select select-success select-bordered w-full" v-model="form.cat_id">
                    <option disabled="" selected="">Choose your category</option>
                    <option v-for="cat in cats" :key="cat.id" :value="cat.id">{{ cat.name }}</option>

                    </select>





                </div>

                <!-- prices -->

                <label class="label">
                    <span>Prices</span>

                    <span
                    class="bg-gray-500 shadow-sm flex justify-center
                             items-center w-auto h-8 px-2 rounded-full text-white
                             hover:bg-green-600
                             "
                            @click="setAllOldPrices()" >set old prices</span>
                </label>

                <div class="form-control" v-for="(price) in prices_new" :key="price.id">

                      <label class="label">
                            <span class="label-text">{{ getPartitionName(price.partition_id) }}</span>
                             <!-- span for old price   -->
                             <span @click="setOldPrice(price)" class="bg-gray-500 shadow-sm flex justify-center
                             items-center w-auto h-8 px-2 rounded-full text-white
                             hover:bg-green-600
                             ">
                                 {{ getOldPrice(price) }}
                             </span>
                      </label>


                    <input  type="text" class="input input-info"
                     v-model="price.price">


                <!-- form.prices_new[getCurrentPrice(partition.id)] -->
                </div>

                <!-- end prices  -->




            <div class="modal-action flex content-center items-center">
                <button type="submit" class="btn btn-primary">Save</button>
                <label @click="$emit('closeForm')" class="btn">Close</label>
            </div>

            </form>







        </div>
        </div>
      </div>
</template>

<script>
import {globalMix} from '../../globalMix.js'
import ErrorLabel from '../ErrorLabel.vue'

export default {
    components :{
       'error-label' : ErrorLabel
    },
    props :[
        'show' ,
        'formData' ,
        'cats' ,
        'partitions' ,

    ],
    mixins: [
        globalMix ,
    ],

    data:()=>{
        return {
            form : {
                id : -1 ,
                name : '',
                cat:'',
                coad:'',
                price:'',
            } ,
            prices_new : null,
            old_prices_fullfilled: false,
            errors : null,

        }
    },
    mounted(){
    this.form = this.formData ;

    },
    created(){

    },
    watch  :{
        partitions : {immediate : true , handler(val , oldVal){
            if(this.partitions instanceof Function){
                // function

            }
            else{
                this.addNewPriceObj();


                // console.log(this.partitions);
                // if (this.prices_new==null) {
                //     this.addNewPriceObj();
                // }



            }
        }},

        formData : {immediate : true , handler(val , oldVal){
            //  console.log(`my form data ${this.formData}`);
            if(this.formData instanceof Function){
                // function
            }
            else{
                this.form = JSON.parse(JSON.stringify(this.formData)) ;
                this.addNewPriceObj();
                this.errors= null ;


            }
        }}
    },
    methods:{
        addNewPriceObj(){
            // make price new as array and make it empty
        this.prices_new = [];

         // add a price for every partitions
         if(this.partitions instanceof Function){
                // function
         } else {

         this.partitions.forEach(partition => {

                        this.prices_new.push({
                                        id:partition.id,
                                        partition_id : partition.id ,
                                        price : null ,
                                    });
                        });//end for each
         }
        },
        getOldPrice(price){
            // this price send by template loop

            let partition_id = price.partition_id ;
            if (this.form &&  this.form.prices){

            let prices =  this.form.prices ;
            let current_price = prices.filter((el)=>{

                return el.partition_id == partition_id
            })

            if (current_price.length > 0) {

                return current_price[0].price ;
            } else {

                return 0 ;
            }






            }

        },
        setOldPrice(price){
           let oldPrice = this.getOldPrice(price);
           price.price = oldPrice ;
        },
        setAllOldPrices(){

            let oldPrice = 0 ;
            this.prices_new.forEach( (price)=>{
                this.setOldPrice(price);
            });
        },
        getPartitionName(id){

            let name = this.partitions.filter(el => el.id == id )[0]['name'] ;

            return name;

        },
        getCatName(id){

            let name = this.cats.filter(el => el.id == id )[0]['name'] ;

            return name;

        },
        save(){
            this.startLoad();
            let id = this.form.id ;
            if(id==-1){
                //create new
                axios.post('/api/partition/create', this.form )
                .then((res)=>{
                    //console.log(res.data);
                    this.$emit('modelChanged');
                    this.$emit('modelCreated' , this.form );
                    this.$emit('closeForm');
                    this.endLoad();
                    this.fireEvent('dataSaved');

                })
                .catch((e)=>{
                    this.errors = e.response.data.errors;
                    this.endLoad()
                   // console.log( e.response.data.errors);

                })
            } else {
                // edit -> update current
               axios.post('/api/partition/edit', this.form )
                .then(()=>{
                    this.$emit('modelChanged');
                    this.$emit('modelUpdated' , this.form );
                    this.$emit('closeForm');
                    this.endLoad();
                    this.fireEvent('dataSaved');

                })
                .catch((e)=>{
                    this.errors = e.response.data.errors;
                    this.endLoad()
                    //console.log( e.response.data.errors);

                })

            }
        }
    },



}
</script>
