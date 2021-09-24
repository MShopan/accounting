<template >
<Layout>

<stock-per type="add"></stock-per>

</Layout>
</template>

<script>
import Layout from './layout'
import stockPer from '../components/stockPer.vue'
export default {
  components:{
    Layout ,
    stockPer ,
  },
    props :[

    ],
    data: ()=>{
        return {


        }

    }
};
</script>
