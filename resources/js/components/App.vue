
<template>


<div>


        <vs-button-group >
            <vs-button border
            to="/wel"
            >
            welcome
            </vs-button>

            <vs-button border 
            to="/tbl1/mohammed">
            table1
            </vs-button>

            <vs-button border >
            Three
            </vs-button>

            <vs-button border >
            four
            </vs-button>
            
      </vs-button-group>



      <vs-button
        upload
        color="danger"
        border
        :active="active == 2"
        @click="active = 2"
      >
        <i class="bx bxs-heart"></i> Like
      </vs-button>

           <router-view></router-view>
</div>



 
</template>
<script>
    export default {
        name:'App',
             data:() => ({
        active: 0 ,
        upload : true,
      })
    }
</script>
