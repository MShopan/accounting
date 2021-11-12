let bill_source = this.current_section ;

        let customer_name =  this.bill_header.customer_name ;

        let logo = '<h1> ..... ACOUNTING ..... </h1>';

        let header_print = `<tr>
                <th>no.</th>
                <th>product</th>
                <th>quantity</th>
                <th>price</th>
                <th>total</th>
                </tr>` ;

        let bill_footer_print ='';
        bill_source.rows.forEach((row)=>{
                    bill_footer_print = bill_footer_print +

                     `<tr>
                     <td>${1}</td>
                     <td>${row.product_data.name}</td>
                     <td>${row.quant}</td>
                     <td>${row.price}</td>
                     <td>${row.total}</td>
                     </tr>` ;
        });


        this.posPrint(`
             ${logo} <br>
             <div>********** bill no : ${bill_source.bill_id} ********** </div>
             <div>** customer : ${customer_name} **</div>
             <table>
             <thead>
               ${header_print}
             </thead>
             <tbody>
               ${bill_footer_print}
               <tr>
                <td></td>
                <td><strong>Total</strong></td>
                <td></td>
                <td></td>
                <td><strong>${bill_source.big_total}</strong></td>
               </tr>
             </tbody>
             </tabel>
        `);
