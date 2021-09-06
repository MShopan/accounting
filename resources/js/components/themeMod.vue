<template>

    <button class="btn btn-square btn-ghost" @click="setDark()">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-6 h-6 stroke-current">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
      </svg>
    </button>

</template>


<script>

import {globalMix} from '../globalMix'

export default {
  components: {

  } ,
  mixins:[globalMix],
  data : ()=>{
      return {

        dark: 1,

      }
  },
  mounted(){
        this.dark =  this.persist('dark_mode' , 1);

        let theme ;

        // theme = this.dark ? 'dark' : 'light' ;

        if(this.dark==1) { theme='dark' } else {theme='light'}

        console.log(this.dark);
        console.log(theme);

        window.document.getElementsByTagName('html')[0].setAttribute('data-theme',theme);


  },
  created(){


  },
  methods:{
      setDark (){
          if(this.dark == 1) {this.dark = 0} else {this.dark = 1}

          let theme ;

          if(this.dark==1) { theme='dark' } else  { theme='light' }

          localStorage.setItem('dark_mode' , this.dark);

          document.getElementsByTagName('html')[0].setAttribute('data-theme',theme);
      }
  }
}
</script>
