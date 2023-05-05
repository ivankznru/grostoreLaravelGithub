<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('tags')->delete();

        \DB::table('tags')->insert(array (
            0 =>
                array (
                    'name' => 'Еда',
                ),
            1 =>
                array (
                    'name' => 'Бакалея',
                ),
            2 =>
                array (
                    'name' => 'Свежие продукты',
                ),
            3 =>
                array (
                    'name' => 'Органические продукты',
                ),
            4 =>
                array (
                    'name' => 'Фрукты',
                ),
            5 =>
                array (
                    'name' => 'Электронная коммерция',
                ),
            6 =>
                array (
                    'name' => 'Здоровая диета',
                ),
        ));
    }
}
