<template >
<Layout>

<stock-comp></stock-comp>

</Layout>
</template>

<script>
import Layout from './layout'
import stockComp from '../components/stockComp.vue'
export default {
  components:{
    Layout ,
    stockComp ,
  },
    props :[

    ],
    data: ()=>{
        return {


        }

    }
};
</script>
