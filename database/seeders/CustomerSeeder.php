<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

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
}
