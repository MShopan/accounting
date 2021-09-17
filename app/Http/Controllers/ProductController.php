<?php

namespace App\Http\Controllers;

use App\Models\Price;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $rulesold = [
        'name' => 'required|max:20',
        'treat' => 'required',
        'coad' => 'required'
        //'coad' => 'nullable' use this for nullable fields

    ];
    private $rules = [
        'coad' => 'required|numeric' ,
        'name' => 'required|max:40' ,
        'cat_id' => 'numeric' ,
        'min_stock' => 'numeric' ,
        'popular' => 'numeric' ,
    ];

    public function index()
    {
        //
    }


    public function create(Request $req)
    {

        $frontend_product = $req->validate($this->rules);


        $product = Product::create($frontend_product);

        // get product id
        $product_id = $product['id'];


        // ### assign new prices


        $prices_new =  $req->input('prices_new');

        foreach ($prices_new as $key => $price) {

            $_partition_id = $price['partition_id'] ;

            $_price = $price['price'] ;

            if($_price==null){ // assign 0 againest null
                $_price = 0 ;
            }

            $new_prices = Price::create([
                'product_id' => $product_id ,
                'partition_id' => $_partition_id ,
                'price' => $_price ,
            ]);
        }



        return response()->json($product);
    }


    public function store(Request $request)
    {
        //
    }

    public function show(Product $product)
    {
        //
    }


    public function edit(Request $req)
    {
        $product_id = $req->input('id');

        $frontend_product = $req->validate($this->rules);


        $product = Product::find($product_id)->update($frontend_product);


        // ### assign new prices
        // delete old price frist
        $prices = Price::where('product_id',$product_id)->delete();

       $prices_new =  $req->input('prices_new');

        foreach ($prices_new as $key => $price) {

            $_partition_id = $price['partition_id'] ;

            $_price = $price['price'] ;

            if($_price==null){ // assign 0 againest null
                $_price = 0 ;
            }

            $new_prices = Price::create([
                'product_id' => $product_id ,
                'partition_id' => $_partition_id ,
                'price' => $_price ,
            ]);
        }



        return response()->json($product);
    }


    public function update(Request $request, Product $product)
    {
        //
    }


    public function destroy(Product $product)
    {
        //
    }
}
