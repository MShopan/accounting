<template >
<Layout>

<mybills-comp></mybills-comp>

</Layout>
</template>

<script>
import mybillsComp from '../components/mybillsComp.vue';
import Layout from './layout'
export default {
  components:{
    Layout,
    mybillsComp ,
  },
    props :[

    ],
    data: ()=>{
        return {


        }

    }
};
</script>
