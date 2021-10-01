<template>
  <main>
    <header>
        <div class="navbar mb-2 shadow-lg bg-neutral text-neutral-content rounded-box">
  <div class="flex-none px-2 mx-2">
    <span class="text-lg font-bold">
            <Link href="/">{{ appName }} </Link>
          </span>
  </div>
  <div class="flex-1 px-2 mx-2">
    <div class="items-stretch hidden lg:flex">

      <Link class="btn btn-ghost btn-sm rounded-btn" href="/home">{{$t('acc.home')}}</Link>
      <!-- <Link class="btn btn-ghost btn-sm rounded-btn" href="/myposts">{{$t('acc.posts')}}</Link> -->
      <Link class="btn btn-ghost btn-sm rounded-btn" href="/myusers">{{$t('acc.users')}}</Link>
      <Link class="btn btn-ghost btn-sm rounded-btn" href="/customers">{{$t('acc.customers')}}</Link>
      <Link class="btn btn-ghost btn-sm rounded-btn" href="/partitions">{{$t('acc.partitions')}}</Link>
      <Link class="btn btn-ghost btn-sm rounded-btn" href="/cats">{{$t('acc.category')}}</Link>
      <Link class="btn btn-ghost btn-sm rounded-btn" href="/products">{{$t('acc.products')}}</Link>
      <Link class="btn btn-ghost btn-sm rounded-btn" href="/stock">{{$t('acc.stock_permissions')}}</Link>
      <Link class="btn btn-ghost btn-sm rounded-btn" href="/stock_add">{{$t('acc.stock_add')}}  </Link>
      <Link class="btn btn-ghost btn-sm rounded-btn" href="/stock_dis">{{$t('acc.stock_dis')}}  </Link>
      <Link class="btn btn-ghost btn-sm rounded-btn" href="/mybills">{{$t('acc.my_bills')}}  </Link>
      <Link class="btn btn-ghost btn-sm rounded-btn" href="/bills">{{$t('acc.view_bills')}}  </Link>



    </div>
  </div>
  <div class="flex-none">
        <success-msg></success-msg>
        <load></load>
        <offline></offline>
        <!-- here -->
                <!-- lang btn  -->
                <div class="dropdown">
                        <!-- btn for lang  -->
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M7 2a1 1 0 011 1v1h3a1 1 0 110 2H9.578a18.87 18.87 0 01-1.724 4.78c.29.354.596.696.914 1.026a1 1 0 11-1.44 1.389c-.188-.196-.373-.396-.554-.6a19.098 19.098 0 01-3.107 3.567 1 1 0 01-1.334-1.49 17.087 17.087 0 003.13-3.733 18.992 18.992 0 01-1.487-2.494 1 1 0 111.79-.89c.234.47.489.928.764 1.372.417-.934.752-1.913.997-2.927H3a1 1 0 110-2h3V3a1 1 0 011-1zm6 6a1 1 0 01.894.553l2.991 5.982a.869.869 0 01.02.037l.99 1.98a1 1 0 11-1.79.895L15.383 16h-4.764l-.724 1.447a1 1 0 11-1.788-.894l.99-1.98.019-.038 2.99-5.982A1 1 0 0113 8zm-1.382 6h2.764L13 11.236 11.618 14z" clip-rule="evenodd" />
                        </svg>
                </button>
                <ul tabindex="0" class="p-2 shadow menu dropdown-content bg-base-100 rounded-box w-52">
                    <li>
                    <a @click="assign_lang('ar')"> العربية </a>
                    </li>
                    <li>
                    <a  @click="assign_lang('en')"> en </a>
                    </li>

                </ul>
                </div>

                <!-- end dropdown lang  -->
        <theme-mod></theme-mod>

       <!-- user  -->
        <Link href="/login">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
            </svg>
        </Link>


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
     assign_lang(lang){
           localStorage.setItem('lang' , lang)
           location.reload()

     }
  }
}
</script>
