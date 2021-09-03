<template >
<Layout>

 <partition-comp></partition-comp>

</Layout>
</template>

<script>
import Layout from './layout'
import partitionComp from '../components/partitionComp.vue'
export default {
  components:{
    Layout ,
    partitionComp ,
  },
    props :[

    ],
    data: ()=>{
        return {


        }

    }
};
</script>
