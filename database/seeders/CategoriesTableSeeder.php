<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('categories')->delete();

        \DB::table('categories')->insert(array (
            0 =>
                array (
                    'name' => 'Молочные продукты',
                    'slug' => 'molocnye-produkty-x0O7f',
                    'parent_id' => '0',
                    'level' => '0',
                    'sorting_order_level' => '0',
                    'thumbnail_image' => '7',
                    'icon' => '',
                    'is_featured' => '0',
                    'is_top' => '0',
                    'total_sale_count' => '0',
                    'meta_title' => '0',
                    'meta_image' => '0',
                    'meta_description' => '0'
                ),
            1 =>
                array (
                    'name' => 'Мясо и рыба',
                    'slug' => 'miaso-i-ryba-zj4qc',
                    'parent_id' => '0',
                    'level' => '0',
                    'sorting_order_level' => '0',
                    'thumbnail_image' => '8',
                    'icon' => '',
                    'is_featured' => '0',
                    'is_top' => '0',
                    'total_sale_count' => '0',
                    'meta_title' => '0',
                    'meta_image' => '0',
                    'meta_description' => '0'
                ),
            2 =>
                array (
                    'name' => 'Пекарня и печенье',
                    'slug' => 'pekarnia-i-pecene-eo1Xf',
                    'parent_id' => '0',
                    'level' => '0',
                    'sorting_order_level' => '0',
                    'thumbnail_image' => '9',
                    'icon' => '',
                    'is_featured' => '0',
                    'is_top' => '0',
                    'total_sale_count' => '0',
                    'meta_title' => '0',
                    'meta_image' => '0',
                    'meta_description' => '0'
                ),
            3 =>
                array (
                    'name' => 'Красота и здоровье',
                    'slug' => 'krasota-i-zdorove-TlSzR',
                    'parent_id' => '0',
                    'level' => '0',
                    'sorting_order_level' => '0',
                    'thumbnail_image' => '10',
                    'icon' => '',
                    'is_featured' => '0',
                    'is_top' => '0',
                    'total_sale_count' => '0',
                    'meta_title' => '0',
                    'meta_image' => '0',
                    'meta_description' => '0'
                ),
            4 =>
                array (
                    'name' => 'Моющие средства',
                    'slug' => 'moiushhie-sredstva-2BNl5',
                    'parent_id' => '0',
                    'level' => '0',
                    'sorting_order_level' => '0',
                    'thumbnail_image' => '11',
                    'is_featured' => '0',
                    'is_top' => '0',
                    'total_sale_count' => '0',
                    'meta_title' => '0',
                    'meta_image' => '0',
                    'meta_description' => '0'
                ),
            5 =>
                array (
                    'name' => 'Завтраки',
                    'slug' => 'zavtraki-JhGBg',
                    'parent_id' => '0',
                    'level' => '0',
                    'sorting_order_level' => '0',
                    'thumbnail_image' => '12',
                    'icon' => '',
                    'is_featured' => '0',
                    'is_top' => '0',
                    'total_sale_count' => '0',
                    'meta_title' => '0',
                    'meta_image' => '0',
                    'meta_description' => '0'
                ),
            6 =>
                array (
                    'name' => 'Детское питание',
                    'slug' => 'detskoe-pitanie-G73W1',
                    'parent_id' => '0',
                    'level' => '0',
                    'sorting_order_level' => '0',
                    'thumbnail_image' => '13',
                    'icon' => '',
                    'is_featured' => '0',
                    'is_top' => '0',
                    'total_sale_count' => '0',
                    'meta_title' => '0',
                    'meta_image' => '0',
                    'meta_description' => '0'
                ),
            7 =>
                array (
                    'name' => 'Питание для животных',
                    'slug' => 'pitanie-dlia-zivotnyx-8AsuR',
                    'parent_id' => '0',
                    'level' => '0',
                    'sorting_order_level' => '0',
                    'thumbnail_image' => '14',
                    'icon' => '',
                    'is_featured' => '0',
                    'is_top' => '0',
                    'total_sale_count' => '0',
                    'meta_title' => '0',
                    'meta_image' => '0',
                    'meta_description' => '0'
                ),
            8 =>
                array (
                    'name' => 'Джемы и желе',
                    'slug' => 'dzemy-i-zele-9LX8o',
                    'parent_id' => '0',
                    'level' => '0',
                    'sorting_order_level' => '0',
                    'thumbnail_image' => '15',
                    'icon' => '',
                    'is_featured' => '0',
                    'is_top' => '0',
                    'total_sale_count' => '0',
                    'meta_title' => '0',
                    'meta_image' => '0',
                    'meta_description' => '0'
                ),
            9 =>
                array (
                    'name' => 'Мед',
                    'slug' => 'med-IGaDW',
                    'parent_id' => '0',
                    'level' => '0',
                    'sorting_order_level' => '0',
                    'thumbnail_image' => '16',
                    'icon' => '',
                    'is_featured' => '0',
                    'is_top' => '0',
                    'total_sale_count' => '0',
                    'meta_title' => '0',
                    'meta_image' => '0',
                    'meta_description' => '0'
                ),
            10 =>
                array (
                    'name' => 'Холодные напитки',
                    'slug' => 'xolodnye-napitki-eYXN2',
                    'parent_id' => '0',
                    'level' => '0',
                    'sorting_order_level' => '0',
                    'thumbnail_image' => '17',
                    'icon' => '',
                    'is_featured' => '0',
                    'is_top' => '0',
                    'total_sale_count' => '0',
                    'meta_title' => '0',
                    'meta_image' => '0',
                    'meta_description' => '0'
                ),
            11 =>
                array (
                    'name' => 'Свежая органика',
                    'slug' => 'svezaia-organika-G4xNZ',
                    'parent_id' => '0',
                    'level' => '0',
                    'sorting_order_level' => '0',
                    'thumbnail_image' => '18',
                    'icon' => '',
                    'is_featured' => '0',
                    'is_top' => '0',
                    'total_sale_count' => '0',
                    'meta_title' => '0',
                    'meta_image' => '0',
                    'meta_description' => '0'
                ),
            12 =>
                array (
                    'name' => 'Фрукты',
                    'slug' => 'frukty-2oPMc',
                    'parent_id' => '0',
                    'level' => '0',
                    'sorting_order_level' => '0',
                    'thumbnail_image' => '19',
                    'icon' => '',
                    'is_featured' => '0',
                    'is_top' => '0',
                    'total_sale_count' => '0',
                    'meta_title' => '0',
                    'meta_image' => '0',
                    'meta_description' => '0'
                ),
            13 =>
                array (
                    'name' => 'Кофе',
                    'slug' => 'kofe-FCLiq',
                    'parent_id' => '0',
                    'level' => '0',
                    'sorting_order_level' => '0',
                    'thumbnail_image' => '20',
                    'icon' => '',
                    'is_featured' => '0',
                    'is_top' => '0',
                    'total_sale_count' => '0',
                    'meta_title' => '0',
                    'meta_image' => '0',
                    'meta_description' => '0'
                ),
            14 =>
                array (
                    'name' => 'Овощи',
                    'slug' => 'ovoshhi-8GRqu',
                    'parent_id' => '0',
                    'level' => '0',
                    'sorting_order_level' => '0',
                    'thumbnail_image' => '21',
                    'icon' => '',
                    'is_featured' => '0',
                    'is_top' => '0',
                    'total_sale_count' => '0',
                    'meta_title' => '0',
                    'meta_image' => '0',
                    'meta_description' => '0'
                ),
        ));
    }
}
