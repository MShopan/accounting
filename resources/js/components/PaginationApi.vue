<template>
<div v-if="links">
 <div v-if="links.length > 3">
    <div class="flex flex-wrap -mb-1">

      <template v-for="(link, k) in links" >
        <div :key="k" v-if="link.url === null"  class="mr-1 mb-1 px-4 py-3 text-sm leading-4 text-gray-400 border rounded" v-html="link.label" />
        <button :key="k" v-else
        preserve-state
        preserve-scroll

        class="mr-1 mb-1 px-4 py-3 text-sm
         leading-4 border rounded hover:bg-white
          focus:border-indigo-500 focus:text-indigo-500"
        :class="{ 'bg-blue-700 text-white': link.active }"
        :href="link.url"
        @click="firePage(link)"
        >
        {{labeling(link.label)}}
        </button>

      </template>
    </div>
  </div>
</div>

</template>

<script>

export default {
    components: {
    },
  props: {
    links: Array,
  },

  data :()=>{
     return {

     }
  }, mounted(){

  },
  methods:{
      labeling(label){
        if (label.includes('Next')) {
            return this.$t('acc.next')
        } else if (label.includes('Previous')){
            return this.$t('acc.previous')

        } else {
            return label
        }
      },
    firePage(link){
        let split = link.url.split("page=");
        let page = split[1] ;
        this.$emit('pagination-change-page', page);
    }
  },
  watch: {
    //   links (){
    //       console.log(this.links);
    //   }
  },
}
</script>
