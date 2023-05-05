<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Product_categoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('product_categories')->delete();

        \DB::table('product_categories')->insert(array (
            0 =>
                array (
                    'product_id' => '1',
                    'category_id' => '12',
                ),
            1 =>
                array (
                    'product_id' => '1',
                    'category_id' => '13',
                ),
        ));
    }
}
