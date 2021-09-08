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
            title: 'Are you sure?',
            text: `delete ${model} no. ${id}`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
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

        }
    }
}

