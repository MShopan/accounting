<template>
<div>
    <!-- section is grouped by partitions  -->
    <div class="my-warpper  grid grid-cols-3 gap-2 ">

   <div v-for="partition,key in sections"  :key="key"
   class="card glass m-8 mb-8 shadow-sm rounded-sm
   flex justify-center items-center
   ">
       <!-- flex justify-center items-center -->
       <div class="card-title"> {{ partition.name }} </div>
       <button class="btn" :class="{ 'btn-success' : section.bill_id > 0 }"
        v-for="section,key in partition.sections"
        :key="key">{{ section.name }}</button>
    </div>

    </div>
</div>
</template>

<script>
export default {
   data:()=>{
       return {
           sections : {}
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
                   partition.sections.forEach( section=>{ section.active = true  } )
               });
           }
       }
   },
   methods:{
      get_sections(){
          axios.get('api/mybills/sections').then((res)=>{
              this.sections = res.data ;

            //   console.log(res.data);
          })
      }
   }
}
</script>
