<template>
    <div v-show="show" class="text-green-300">
        data saved
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
          window.addEventListener('dataSaved',()=>{
              this.show = true;
              setTimeout(() => {
                  this.show=false ;
              }, 1000);
          });
      }
}

</script>
