// this is global mixin in the projct
import axios from 'axios';
import {get_data , help} from './helper' ;
export const globalMix =  {
    data() {
        return {
            Age : 29
        }
    },
    methods:{
        formateDatetime(datetime){
            let phase1 = datetime.split(".")[0];
            let phase2 = phase1.split("T");

            let final = `${phase2[0]} ${phase2[1]}`

          return final ;
        },
        fireEvent(name){
            const event = new Event(name);
            window.dispatchEvent(event);
        },
        startLoad(){
            // console.log('start loading');
            this.fireEvent('startLoad');
        },
        endLoad(){
            // console.log('end loading');
            this.fireEvent('endLoad');

        },
        deleteModel(model,id,updateFunction){

           this.$swal.fire({
            title: this.$t('acc.sure'),
            text: `${this.$t('acc.delete')} ${model} ${this.$t('acc.no')} ${id}`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: this.$t('acc.yes'),
            cancelButtonText: this.$t('acc.refuse')
          }).then((result) => {
            if (result.isConfirmed) {
                // do delete here
                this.startLoad();
                axios.post('/api/delete/model',{
                    model : model ,
                    id : id ,
                })
                .then(()=>{

                    updateFunction();
                    this.$emit('modelDeleted', {
                     model : model ,
                     id : id
                    });

                    this.fireEvent('dataSaved');
                    this.endLoad();
                })

                // end do delete
            }
          })


        },
        persist(local_name , defaultVal) {
            let _local = localStorage.getItem(local_name) ;
            if ( _local === null) {
                return defaultVal ;
            } else {
                // console.log('local return ',_local);
                return JSON.parse(_local) ;
            }

        },
        // printing methods
        posPrint(myData) {
            var config = qz.configs.create("Microsoft Print to PDF");

             var data = [{
             type: 'pixel',
             format: 'html',
             flavor: 'plain', // or 'plain' if the data is raw HTML
             data: myData ,
             }];
             qz.print(config, data).catch(function(e) { console.error(e); });

         },
    }
}

