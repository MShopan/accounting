
<template>
   <v-container>
       <v-btn elevation="20" color="primary">OK</v-btn> 
       
       <v-btn
  color="error"
  elevation="2"
> add</v-btn>



           <router-link to="/wel" >link wel</router-link>

           <router-view></router-view>
   </v-container>

 
</template>
<script>
    export default {
        name:'App'
    }
</script>
