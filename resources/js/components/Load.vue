<template>
    <div v-show="show" class="text-red-300 mx-4">
        Loading...
    </div>
</template>

<script>

export default {
    data:()=>{
       return {
           show:false
       }
    } ,
      mounted(){
          window.addEventListener('startLoad',()=>{
              this.show = true;
          });
          window.addEventListener('endLoad',()=>{
              this.show = false;
          });
      }
}

</script>
