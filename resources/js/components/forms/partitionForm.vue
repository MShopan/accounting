<template>
          <div id="post-modal">
            <input class="modal-toggle" type="checkbox" id="my-modal-2"  v-model="show">
            <div class="modal">
           <div class="modal-box ">


             <form @submit.prevent="submit">
                <div class="form-control" >

                      <label class="label">
                            <span class="label-text">Name</span>
                        </label>

                    <input  type="text" class="input input-success " v-model="form.name" >

                </div>
                <div class="form-control" >

                      <label class="label">
                            <span class="label-text">Treat</span>
                        </label>

                    <input  type="text" class="input input-success " v-model="form.treat" >

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
            } ,

        }
    },
    mounted(){
       this.form = this.formData ;
    },
    watch  :{
        formData : {immediate : true , handler(val , oldVal){
            // console.log(this.formData);
            this.form = JSON.parse(JSON.stringify(this.formData)) ;
        }}
    },
    methods:{
        save(){
            this.startLoad();
            let id = this.form.id ;
            if(id==-1){
                //create new
                axios.post('/partition/create', this.form )
                .then(()=>{
                    this.$emit('modelReload');
                    this.$emit('modelCreated' , this.form );
                    this.endLoad();
                    this.fireEvent('dataSaved');

                })
            } else {
                // edit -> update current
               axios.post('/partition/edit', this.form )
                .then(()=>{
                    this.$emit('modelReload');
                    this.$emit('modelUpdated' , this.form );
                    this.endLoad();
                    this.fireEvent('dataSaved');

                })

            }
        }
    },



}
</script>
