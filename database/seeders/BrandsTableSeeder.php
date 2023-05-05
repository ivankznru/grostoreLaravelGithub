<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('brands')->delete();

        \DB::table('brands')->insert(array (
            0 =>
                array (
                    'name' => '',
                    'slug' => '',
                    'brand_image' => '',
                    'total_sales_amount' => '',
                    'is_active' => '',
                    'meta_title' => '',
                    'meta_image' => '',
                    'meta_description' => ''
                ),
        ));
    }
}
