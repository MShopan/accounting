<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\bill_temp_footer;
use App\Models\mainVar;
use App\Models\Partition;
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

    public function add_product_with_new_bill_id(Request $request)
    {
      $counter = $this->bill_counter_increase();
      $section_id = $request->input('section_id') ;
      $product = $request->input('product') ;

    //   dd($product);

      $product_id = $product['id'];

      $quant = $product['quant'];


      bill_temp_footer::create([

          'bill_id' => $counter,
          'product_id' => $product_id,
          'quant' => $quant,

      ]);

      return response()->json('add product success');


    }

    public function refresh_section(Request $request)
    {
        $section_id = $request->input('id');
        // dd($section_id);
        $section = Section::find($section_id);
        $rows = bill_temp_footer::where('bill_id' ,$section['bill_id'] )->get();
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
