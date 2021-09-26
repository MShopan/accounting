<?php
/**
 * !important
 * do not forget use first or get when use where
 */
namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\bill_temp_footer;
use App\Models\bill_temp_header;
use App\Models\Customer;
use App\Models\mainVar;
use App\Models\Partition;
use App\Models\Product;
use App\Models\Section;
use Illuminate\Http\Request;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function get_sections()
    {
        // group section with own partition
        $partitions = Partition::all();

        foreach ($partitions as $key => $partition) {
            $sections = Section::where('partition_id', $partition['id'] )->get() ;
            $partition['sections'] = $sections ;
        }
        return response()->json($partitions);

    }

    public function index()
    {
        //
    }

    public function bill_counter_increase()
    {
        // the value defult value is zero
        $counter = mainVar::where('name','bill_counter' )->first();
        $counter->value++ ;
        $counter->save();
        return $counter['value'];
    }

    /**
     * do this functino when open section bill if closed and will open it
     */
    public function add_product_with_new_bill_id(Request $request)
    {
        // get new bill id
        $new_bill_id = $this->bill_counter_increase();

        $section_id = $request->input('section_id') ;

        $this->add_new_bill_in_section($section_id,$new_bill_id);

        $this->add_product_to_temp_footer($new_bill_id,$request);

        // add temp header

        $this->add_bill_temp_header($new_bill_id);



      return response()->json('add product success');


    }

    public function add_bill_temp_header($bill_id){
        $header = bill_temp_header::create([
            'bill_id' => $bill_id
        ]);

    }

    /**
     * for section who has bill id before and section still obened
     */
    public function add_product_to_bill_id(Request $request){

        $section_id = $request->input('section_id') ;

        // find bill id from the current section

        $bill_id = Section::find($section_id)->bill_id ;

        $this->add_product_to_temp_footer($bill_id,$request);



      return response()->json('add product to current section success success');
    }

    public function add_new_bill_in_section($section_id,$new_bill_id)
    {
               // save data to section
               $section = Section::find($section_id);
               $section->bill_id = $new_bill_id ;
               $section->status = "opened" ;

               $section->save() ;
    }

    public function add_product_to_temp_footer($bill_id,$request)

    {
        $product = $request->input('product') ;

        // save data to temp footer
        $product_id = $product['id'];

        $quant = $product['quant'];

        $partition_id = $request->input('partition_id') ;

        $prices = $product['prices'];

        // get partion price
        $partition_price = 0 ; // define price for partition

        foreach ($prices as $key => $price) {
            # code...
            if ($price['partition_id'] == $partition_id ) {
                $partition_price = $price ;
            }
        }

        // dd([
        //     $partition_price
        // ]);

        // save data to temp footer
        $rows = new bill_temp_footer ;

        $rows->bill_id = $bill_id ;
        $rows->product_id = $product_id ;
        $rows->quant = $quant ;
        $rows->price = $partition_price['price'] ;
        $rows->total = $quant *  $partition_price['price']  ;

        $rows->save();
    }

    public function assign_customer_to_bill_id(Request $request)
    {
        $section_id = $request->input('section_id') ;
        $section = Section::find($section_id) ;
        // dd($section);
        $bill_id =$section['bill_id'] ;

        $customer = $request->input('customer');

        // find if exist before

        $header = bill_temp_header::where('bill_id',$bill_id)->first() ;

        if ($header==null) {
            $header = bill_temp_header::create([
                'bill_id' => $bill_id ,
                'customer_id' => $customer['id'] ,

            ]);
        } else {

            $header->update([
                'customer_id' => $customer['id'] ,
            ]);
        }




          return response()->json($customer) ; // return assigned customer
    }

    public function assign_employee_to_bill_id(Request $request)
    {

    }

    public function get_bill_header(Request $request)
    {
        $section_id = $request->input('section_id') ;

        $section = Section::find($section_id) ;

        $bill_id = $section['bill_id'];

        if ($bill_id != -1) {

                        $bill_header = bill_temp_header::where('bill_id' , $bill_id)->first();

                        $customer = Customer::find($bill_header['customer_id']) ;


                        if ($customer!=null) {
                            # code...
                            $bill_header['customer_name'] = $customer['name'] ;
                        }


                        return response()->json($bill_header) ;
        } else {
             // return empty details
            return response()->json([
                'bill_id' => 0 ,
                'customer_name' => '' ,
            ]) ;
        }




    }

    public function refresh_section(Request $request)
    {
        $section_id = $request->input('id');
        // dd($section_id);
        $section = Section::find($section_id);
        $rows = bill_temp_footer::where('bill_id' ,$section['bill_id'] )->get();

        foreach ($rows as $key => $row) {
            $row['product_data'] = Product::find($row['product_id']);
        }
        //  dd($rows);
        return response()->json($rows);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function show(Bill $bill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function edit(Bill $bill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bill $bill)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bill $bill)
    {
        //
    }
}
