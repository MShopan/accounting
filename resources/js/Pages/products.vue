<template >
<Layout>

<product-comp></product-comp>

</Layout>
</template>

<script>
import ProductComp from '../components/productComp.vue';
import Layout from './layout'
export default {
  components:{
    Layout,
    ProductComp ,
  },
    props :[

    ],
    data: ()=>{
        return {


        }

    }
};
</script>
