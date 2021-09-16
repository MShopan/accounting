<template>
          <div class="">
            <input class="modal-toggle" type="checkbox" id="my-modal-2"  v-model="show">
            <div class="modal overflow-auto">
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

                <h3 class="pt-2">prices</h3>

                <div class="form-control" v-for="(partition) in partitions" :key="partition.id">

                      <label class="label">
                            <span class="label-text">{{ partition.name }}</span>
                      </label>

                    <input  type="text" class="input input-info " :value="getCurrentPrice(partition.id)">

                    <!-- form.prices[0].price -->


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
            errors : null,

        }
    },
    mounted(){
       this.form = this.formData ;
    },
    watch  :{
        formData : {immediate : true , handler(val , oldVal){
            //  console.log(`my form data ${this.formData}`);
            if(this.formData instanceof Function){
                // function
            }
            else{
                this.form = JSON.parse(JSON.stringify(this.formData)) ;
                this.errors= null ;
            }
        }}
    },
    methods:{
        getCurrentPrice(partition_id){
            let prices =  this.form.prices ;
            console.log(prices);
            let current_price = prices.filter((price)=>{ price.partition_id == partition_id  })
            console.log(` curr ${current_price}`);
            return current_price.price ;
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
