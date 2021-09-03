<template>
    <div v-show="show" class="text-red-500">
        offline
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

        window.addEventListener('offline', ()=>{this.show=true});
        window.addEventListener('online',  ()=>{this.show=false});

      }
}

</script>
