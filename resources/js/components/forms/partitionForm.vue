<template>
          <div id="post-modal">
            <input class="modal-toggle" type="checkbox" id="my-modal-2"  v-model="show">
            <div class="modal">
           <div class="modal-box ">


             <form @submit.prevent="save">
                <div class="form-control" >

                      <label class="label">
                            <span class="label-text">Name</span>
                        </label>

                    <input  type="text" class="input input-success " v-model="form.name" >

                    <span v-if="errors && errors.name" class="text-red-600 transition duration-500 ease-in-out -translate-y-1 scale-110">{{ errors.name[0] }}</span>

                </div>
                <div class="form-control" >

                      <label class="label">
                            <span class="label-text">Coad</span>
                        </label>

                    <input  type="text" class="input input-success " v-model="form.coad" >
                 <span v-if="errors && errors.coad" class="text-red-600 transition duration-500 ease-in-out">{{ errors.coad[0] }}</span>


                </div>
                <div class="form-control" >

                      <label class="label">
                            <span class="label-text">Treat</span>
                        </label>

                    <input  type="text" class="input input-success " v-model="form.treat" >
                    <span v-if="errors && errors.treat" class="text-red-600 transition duration-500 ease-in-out">{{ errors.treat[0] }}</span>


                </div>


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

export default {
    props :[
        'show' ,
        'formData' ,
    ],
    mixins: [
        globalMix ,
    ],

    data:()=>{
        return {
            form : {
                id : -1 ,
                name : '',
                treat:'',
                coad:'',
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
        save(){
            this.startLoad();
            let id = this.form.id ;
            if(id==-1){
                //create new
                axios.post('/api/partition/create', this.form )
                .then((res)=>{
                    console.log(res.data);
                    this.$emit('modelChanged');
                    this.$emit('modelCreated' , this.form );
                    this.$emit('closeForm');
                    this.endLoad();
                    this.fireEvent('dataSaved');

                })
                .catch((e)=>{
                    this.errors = e.response.data.errors;
                    console.log( e.response.data.errors);

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
                    console.log( e.response.data.errors);

                })

            }
        }
    },



}
</script>
