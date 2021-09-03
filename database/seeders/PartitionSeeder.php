<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PartitionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
}
