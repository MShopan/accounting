// this is global mixin in the projct
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
    }
}

