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
export default {
    props :[
        'show' ,
        'formData' ,
    ],

    data:()=>{
        return {
            form : {
                name : '',
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



}
</script>
