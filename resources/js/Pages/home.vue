<template>
<Layout>
    <div>
        <h1 class="flex justify-center items-center  mt-40 text-xl">{{$t('acc.welcome')}}</h1>
    </div>
</Layout>
</template>

<script>
import Layout from './layout'

export default {
  components : {
      Layout,
  }
};
</script>
