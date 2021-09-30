<?php

namespace App\Http\Controllers;

use App\Models\User;


use App\Models\Cat;
use App\Models\Section;
use App\Models\mainVar;
use App\Models\Product;
use App\Models\Price;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class mySeederController extends Controller
{

    public function index()
    {

         $section = Section::find(1);

         if ($section==null) {  // check is this is the first time to seed data to db
            // do all seeder here

            $this->seed_partitions();
            $this->seed_sections();
            $this->seed_counter();
            $this->seed_products();
            $this->seed_customers();
            $this->seed_cats();

            return response()->json('seeding data success');

         } else {
            return response()->json('you already seeding data before');

         }
    }

    public function seed_users()
    {

    }

    public function seed_cats()
    {
        # code...
        $cat = Cat::create([
            'coad' => 1 ,
            'name' => 'market' ,

        ]);
        $cat = Cat::create([
            'coad' => 2 ,
            'name' => 'cafe' ,

        ]);
        $cat = Cat::create([
            'coad' => 3 ,
            'name' => 'resturant' ,

        ]);

    }

    public function seed_sections()
    {
        $section = Section::create([
            'name' => 's1' ,
            'partition_id' => 1 ,
            'employee_id'=> 1,
        ]);
         $section = Section::create([
            'name' => 'b1' ,
            'partition_id' => 2 ,
            'employee_id'=> 1,
        ]);
         $section = Section::create([
            'name' => 'c1' ,
            'partition_id' => 3 ,
            'employee_id'=> 1,
        ]);
    }

    public function seed_partitions()
    {
        # code...
        DB::table('partitions')->insert([
            'coad'=>'cc1',
            'name'=>'cafe',
            'treat'=>'c',
        ]);
        DB::table('partitions')->insert([
            'coad'=>'cc2',
            'name'=>'sale',
            'treat'=>'c',
        ]);
        DB::table('partitions')->insert([
            'coad'=>'cc3',
            'name'=>'market',
            'treat'=>'c',
        ]);
        DB::table('partitions')->insert([
            'coad'=>'tt1',
            'name'=>'takeaway',
            'treat'=>'t',
        ]);
    }

    public function seed_customers()
    {
        # code...
        $arr = range(1,50);

        $customers = array();

        foreach ($arr as $key => $val) {

            array_push($customers ,[
                'name'=>"mohammed$val",
                'adress1'=>"cairo$val",
                'mobile'=> $val * 5000 ,

            ] )  ;

        }



        DB::table('customers')->insert($customers);
    }

    public function seed_products()
    {
        # code...
        $product = Product::create([
            'coad'=>12,
            'name'=>'moca',
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
                'price'=>$p_arr[$i-1],

            ]);



        }
    }

    public function seed_counter()
    {
        # code...
        mainVar::create([
            'name' => 'bill_counter' ,
            'type'=> 'integer',
            'value'=> 0 ,
        ]);
    }







}
