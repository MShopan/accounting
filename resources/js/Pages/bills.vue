<template >
<Layout>

<bills-comp></bills-comp>

</Layout>
</template>

<script>
import Layout from './layout'
import billsComp from '../components/billsComp.vue'
export default {
  components:{
    Layout ,
    billsComp ,
  },
    props :[

    ],
    data: ()=>{
        return {


        }

    }
};
</script>
