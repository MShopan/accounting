    <template>
    <div>
        <div v-if="loaded">

           hello form vue {{ local }}   {{ model }}

        </div>
    </div>
    </template>

    <script language="javascript">
        import {help , test} from '../helper' ;



        export default {
        data (){
            return {
             loaded : false ,
             local : null ,
            } ;
        },
        name : 'Welcome' ,
        props : ['model'] ,

        mounted (){


            
       let x = help.callme() ;
       let x2 = test.show() ;
        console.log(x+"5466");
        console.log(x2);

            axios({
            method: 'get',
            baseURL: 'http://127.0.0.1:8000/api/' ,
            url: 'first',
            responseType: 'json'
           })
          .then( (response) => {
              console.log('start axios');
               this.local = response.data ;
               console.log(this.local);
               console.log(response);
               this.loaded = true;
             });

          }
        }
    </script>
    