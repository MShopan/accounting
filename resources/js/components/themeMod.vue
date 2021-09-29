<template>

    <button class="btn btn-square btn-ghost" @click="setDark()">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z" />
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
