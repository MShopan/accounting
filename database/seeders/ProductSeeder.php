<?php

namespace Database\Seeders;

use App\Models\Price;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $product = Product::create([
            'coad'=>12,
            'name'=>'tea',
            'cat_id'=>1,
            'stock'=>0,
            'min_stock'=>5,
            'popular'=>true,
        ]);

        // DB::table('products')->insert([

        // ]);

        $p_arr = [5,8,10,3];

        for ($i=1; $i < 5 ; $i++) {


            $price = Price::create([
                'product_id'=>$product->id,
                'partition_id'=>$i,
                'price'=>$p_arr[$i],

            ]);


            $i++;
        }


        // DB::table('prices')->insert([

        // ]);
    }
}
