    <template>
    <div>
        <div v-if="loaded">

           hello form vue {{ local }}   {{ model }}

        </div>
    </div>
    </template>

    <script language="javascript">
        import {get_data , help} from '../helper' ;

        export default {
        data (){
            return {
             loaded : false ,
             local : null ,
            } ;
        },
        name : 'Welcome' ,
        props : ['model'] ,
        methods :{
            async load_data()  {
                 let res = await get_data('first');
                 this.local = res.data ;
                 console.log('local is :'+this.local);
                 this.loaded =true;
            }
        },

        mounted (){

            this.load_data() ;


       let x = help.callme() ;
        console.log(x+" 010");


           

          }
        }
    </script>
    