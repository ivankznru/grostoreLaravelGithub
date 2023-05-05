<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('products')->delete();

        \DB::table('products')->insert(array (
            0 =>
                array (
                    'shop_id' => '1',
                    'added_by' => 'admin',
                    'name' => 'Рамбутан Сладкий вкусный фрукт',
                    'slug' => 'rambutan-sladkii-vkusnyi-frukt-oqndd',
                    'brand_id' => '',
                    'unit_id' => '',
                    'thumbnail_image' => '22',
                    'gallery_images' => '22,23,24,25',
                    'product_tags' => '',
                    'short_description' => '
                     500~600 гр
                     Гранат - один из самых популярных, богатых питательными веществами фруктов, обладающий уникальным ароматом 
                     и укрепляющими здоровье свойствами. Фрукт умеренно калорийный, содержит около 83 калорий на 100 грамм; немного 
                     больше, чем в яблоках. Он не содержит холестерина или насыщенных жиров. Это хороший источник растворимых и 
                     нерастворимых пищевых волокон;',
                    'description' => '
                    <p>500~600 гр</p><p><span style="background-color: var(--bs-body-bg); font-size: var(--bs-body-font-size);
                     font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);">
                     Гранат - один из самых популярных, богатых питательными веществами фруктов, обладающий уникальным ароматом и
                      укрепляющими здоровье свойствами. Фрукт умеренно калорийный, содержит около 83 калорий на 100 грамм; немного
                       больше, чем в яблоках. Он не содержит холестерина или насыщенных жиров. Это хороший источник растворимых и
                        нерастворимых пищевых волокон; его содержание составляет около 4 граммов на 100 г (около 12% суточной нормы).
                         Пищевые волокна способствуют нормальному пищеварению и опорожнению кишечника. 
                         Фрукт также является хорошим источником антиоксидантного витамина С, обеспечивающего около 17% суточной
                          потребности на 100 г. Потребление фруктов, богатых витамином С, помогает организму выработать устойчивость
                           к инфекционным агентам, повышая иммунитет. Зерна граната являются привлекательным гарниром к салатам и
                            блюдам, а из свежих фруктов получается фантастический освежающий сок. Гранатовый сок можно использовать
                             для приготовления супов, желе, сорбетов, соусов, а также для ароматизации тортов, печеных яблок и 
                             других десертов.</span><br></p><p><span style="background-color: var(--bs-body-bg); font-size:
                              var(--bs-body-font-size); font-weight: var(--bs-body-font-weight);
                               text-align: var(--bs-body-text-align);">Минимальный вес: 500-600 г</span><br></p>
                    ',
                    'min_price' => '300',
                    'max_price' => '300',
                    'discount_value' => '0',
                    'discount_type' => 'percent',
                    'discount_start_date' => '',
                    'discount_end_date' => '',
                    'sell_target' => '250',
                    'stock_qty' => '250',
                    'is_published' => '1',
                    'is_featured' => '0',
                    'min_purchase_qty' => '1',
                    'max_purchase_qty' => '1',
                    'has_variation' => '0',
                    'has_warranty' => '1',
                    'total_sale_count' => '0',
                    'standard_delivery_hours' => '72',
                    'express_delivery_hours' => '24',
                    'size_guide' => '',
                    'meta_title' => '',
                    'meta_description' => '',
                    'meta_img' => '',
                ),
        ));
    }
}

