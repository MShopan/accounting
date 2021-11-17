// this is global mixin in the projct
import axios from 'axios';
import {logo_base64} from './logo_base64.js';
import {get_data , help} from './helper' ;
export class Receipt {
    // logo = '<h1> ..... ACOUNTING ..... </h1>';
    logo =`
    ****************************** <br>
    <img style='display:block; width:240px;height:80px;' id='base64image'
       src='${logo_base64}' />
    `;

    preview(){
       localStorage.setItem('receipt', this.generateReceiptData());
       //    alert('preview');
       let _preview = window.open(
        "/preview_receipt",
        "preview_receipt",
        "left=900,top=40,innerWidth=270,innerHeight=600"
       );
    }


}
export class billReceipt extends Receipt {

      bill_id = -1 ;
      bill_source = '' ;
      customer_name = '';
      header_print = `<tr>
                <th>no.</th>
                <th>product</th>
                <th>quantity</th>
                <th>price</th>
                <th>total</th>
                </tr>` ;
      get_bill_id(){
          return this.bill_id ;
      }
      async get_bill_from_db(){
         await axios.get('/api/get_bill_from_db',{params:{
              id: this.bill_id
          }}).then((data)=>{
              this.bill_source = data.data;
              return 0;



          })


      }
      generateReceiptData(){


        // let bill_id = this.current_section.bill_id;

        // let bill_source = this.current_section ;

        // let customer_name =  this.bill_header.customer_name ;


        let bill_footer_print ='';
        let big_total = 0 ;
        this.bill_source.rows.forEach((row)=>{

                    bill_footer_print = bill_footer_print +

                     `<tr>
                     <td>${1}</td>
                     <td>${row.product_data.name}</td>
                     <td>${row.quant}</td>
                     <td>${row.price}</td>
                     <td>${row.total}</td>
                     </tr>` ;

                     big_total += row.total ;
        });

        let billData = `
        ${this.logo} <br>
        <div>********** bill no : ${this.bill_id} ********** </div>
        <div>** customer : ${this.customer_name} **</div>
        <table>
        <thead>
          ${this.header_print}
        </thead>
        <tbody>
          ${bill_footer_print}
          <tr>
           <td></td>
           <td><strong>Total</strong></td>
           <td></td>
           <td></td>
           <td><strong>${big_total}</strong></td>
          </tr>
        </tbody>
        </tabel>
        `;

        return billData ;

       }
       print() {

        this.POS_Print(this.generateReceiptData());

       }
       // printing methods
       POS_Print(myData) {
        var config = qz.configs.create(localStorage.getItem('POS_PrinterName'));

         var data = [{
         type: 'pixel',
         format: 'html',
         flavor: 'plain', // or 'plain' if the data is raw HTML
         data: myData ,
         }];
         qz.print(config, data).catch(function(e) { console.error(e); });

     }

}
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

    }
}

