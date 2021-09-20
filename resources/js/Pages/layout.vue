<template>
  <main>
    <header>
        <div class="navbar mb-2 shadow-lg bg-neutral text-neutral-content rounded-box">
  <div class="flex-none px-2 mx-2">
    <span class="text-lg font-bold">
            {{ appName }}
          </span>
  </div>
  <div class="flex-1 px-2 mx-2">
    <div class="items-stretch hidden lg:flex">

      <Link class="btn btn-ghost btn-sm rounded-btn" href="/home">Home</Link>
      <Link class="btn btn-ghost btn-sm rounded-btn" href="/myposts">Posts</Link>
      <Link class="btn btn-ghost btn-sm rounded-btn" href="/myusers">Users</Link>
      <Link class="btn btn-ghost btn-sm rounded-btn" href="/customers">Customers</Link>
      <Link class="btn btn-ghost btn-sm rounded-btn" href="/partitions">Partitions</Link>
      <Link class="btn btn-ghost btn-sm rounded-btn" href="/cats">Category</Link>
      <Link class="btn btn-ghost btn-sm rounded-btn" href="/products">Products</Link>

    </div>
  </div>
  <div class="flex-none">
        <success-msg></success-msg>
        <load></load>
        <offline></offline>
        <!-- here -->
        <theme-mod></theme-mod>


  </div>
  <div class="flex-none">
    <button class="btn btn-square btn-ghost">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-6 h-6 stroke-current">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
      </svg>
    </button>
  </div>
</div>



    </header>
    <article>
      <slot />
    </article>
  </main>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue'
import successMsg from '../components/successMsg'
import Load from '../components/Load.vue'
import offline from '../components/offline.vue'
import {globalMix} from '../globalMix'
import ThemeMod from '../components/themeMod.vue'

export default {
  components: {
    Link,
    successMsg,
    Load,
    offline,
    ThemeMod,
  } ,
  mixin:
    [globalMix],
  data : ()=>{
      return {
          appName : 'Accounting',

      }
  },
  mounted(){



  },
  created(){


  },
  methods:{

  }
}
</script>
