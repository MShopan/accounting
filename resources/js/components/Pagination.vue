<template>
  <div v-if="links.length > 3">
    <div class="flex flex-wrap -mb-1">

      <template v-for="(link, k) in links" >
        <div v-if="link.url === null"  class="mr-1 mb-1 px-4 py-3 text-sm leading-4 text-gray-400 border rounded" v-html="link.label" />
        <inertia-link v-else
        preserve-state
        preserve-scroll
        :only="[ myOnly ]"
        class="mr-1 mb-1 px-4 py-3 text-sm leading-4 border rounded hover:bg-white focus:border-indigo-500 focus:text-indigo-500"
        :class="{ 'bg-blue-700 text-white': link.active }"
        :href="link.url" v-html="link.label" />







      </template>
    </div>
  </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue'

export default {
    components: {
      'inertia-link' : Link,
    },
  props: {
    links: Array,
    myOnly : null ,
  },
  data :()=>{
     return {

     }
  }
}
</script>
