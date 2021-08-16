    <template>
    <div>
        <div v-if="loaded">

           hello form vue {{ local }}   {{ model }}

        </div>
    </div>
    </template>
    <script>
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
    