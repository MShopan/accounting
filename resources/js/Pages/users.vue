<template >
<Layout>

<user-comp></user-comp>

</Layout>
</template>

<script>
import Layout from './layout'
import userComp from '../components/userComp.vue'
export default {
  components:{
    Layout ,
    userComp ,
  },
    props :[
    'message',
    'users',
    ],
    data: ()=>{
        return {


        }

    }
};
</script>
