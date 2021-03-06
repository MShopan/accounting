<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Stock;
use App\Models\User;
use Illuminate\Http\Request;

class StockController extends Controller
{
    private $rules = [
        'product_id' => 'required',
        'quant' => 'numeric',
        'purchase_price' => 'nullable',
        'creator' => 'nullable',
        'notes' => 'nullable',
    ];

    public function get_stock()
    {

        $stok_pers = Stock::paginate(config('app.perPage'));

        // insert porduct name and user name
        foreach ($stok_pers as $key => $per) {
            // product name
            $per['product_name'] = Product::find($per['product_id'])['name'];

            // user name
            if ($per['creator'] > 0) {
                $user_name = User::find($per['creator'])['name'];
                $per['creator_name'] = $user_name;
            } elseif ($per['creator'] == 0) {
                $per['creator_name'] = "system";

            } else {
                $per['creator_name'] = "none";

            }
        }



        return response()->json($stok_pers);
    }


    public function index()
    {
        return response()->json(Stock::paginate(config('app.perPage')));
    }

    public function create(Request $request)
    {
        //

        // dd($request);
        $frontend_per = $request->validate($this->rules);
        $user = auth()->user()->id;
        $frontend_per['creator'] = $user;
        $stock_per = Stock::create($frontend_per);

        $product = Product::find($request->input('product_id'));

        $new_stock = $product->stock + $request->input('quant');
        //    dd($new_stock);

        $product->stock = $new_stock;

        $product->save();

        return response()->json($stock_per);
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
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit(Stock $stock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stock $stock)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stock $stock)
    {
        //
    }
}
