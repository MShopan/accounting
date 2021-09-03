<template >
<Layout>

 <customer-comp></customer-comp>

</Layout>
</template>

<script>
import Layout from './layout'
import customerComp from '../components/customerComp.vue'
export default {
  components:{
    Layout ,
    customerComp ,
  },
    props :[

    ],
    data: ()=>{
        return {


        }

    }
};
</script>
