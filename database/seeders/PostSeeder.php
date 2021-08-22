<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $_posts = range(1,50);
       $data = [];

       // looping
       foreach ($_posts as $key => $val) {
           $title = "post{$val}" ;
           $desc= "mydesc{$val}";
           $data[] = [
               'user_id'=> 1,
               'title'=> $title,
               'description'=> $desc ,
           ];
       }
       // write in db
       DB::table('posts')->insert($data);




    }
}
