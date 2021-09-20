<template >
<Layout>

 <cat-comp></cat-comp>

</Layout>
</template>

<script>
import Layout from './layout'
import catComp from '../components/catComp.vue'
export default {
  components:{
    Layout ,
    catComp ,
  },
    props :[

    ],
    data: ()=>{
        return {


        }

    }
};
</script>
