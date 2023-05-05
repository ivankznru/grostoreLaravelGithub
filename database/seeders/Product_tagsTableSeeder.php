<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Product_tagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('product_tags')->delete();

        \DB::table('product_tags')->insert(array (
            0 =>
                array (
                    'product_id' => '1',
                    'tag_id' => '1',
                ),
            1 =>
                array (
                    'product_id' => '1',
                    'tag_id' => '2',
                ),
            2 =>
                array (
                    'product_id' => '1',
                    'tag_id' => '3',
                ),
            3 =>
                array (
                    'product_id' => '1',
                    'tag_id' => '4',
                ),
            4 =>
                array (
                    'product_id' => '1',
                    'tag_id' => '7',
                ),
        ));
    }
}
