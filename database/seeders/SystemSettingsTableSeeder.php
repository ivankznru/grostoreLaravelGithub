<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SystemSettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('system_settings')->delete();

        DB::table('system_settings')->insert(array(
            array('id' => '1', 'entity' => 'google_login', 'value' => '0', 'created_at' => '2022-12-07 06:33:40', 'updated_at' => '2022-12-07 06:33:41', 'deleted_at' => NULL),
            array('id' => '2', 'entity' => 'default_currency', 'value' => 'usd', 'created_at' => '2022-12-07 06:55:08', 'updated_at' => '2022-12-07 06:55:08', 'deleted_at' => NULL),
            array('id' => '3', 'entity' => 'no_of_decimals', 'value' => '2', 'created_at' => '2022-12-07 06:55:08', 'updated_at' => '2022-12-07 06:55:08', 'deleted_at' => NULL),
            array('id' => '4', 'entity' => 'truncate_price', 'value' => '0', 'created_at' => '2022-12-07 06:55:08', 'updated_at' => '2022-12-07 06:55:08', 'deleted_at' => NULL),
            array('id' => '5', 'entity' => 'enable_multi_vendor', 'value' => '0', 'created_at' => '2022-12-25 06:00:08', 'updated_at' => '2023-02-18 08:56:54', 'deleted_at' => NULL),
            array('id' => '6', 'entity' => 'default_admin_commission', 'value' => '5', 'created_at' => '2022-12-25 06:00:08', 'updated_at' => '2022-12-25 06:00:08', 'deleted_at' => NULL),
            array('id' => '7', 'entity' => 'vendor_minimum_payout', 'value' => '500', 'created_at' => '2022-12-28 06:34:48', 'updated_at' => '2022-12-28 06:34:48', 'deleted_at' => NULL),
            array('id' => '8', 'entity' => 'order_code_prefix', 'value' => '#G-Store:', 'created_at' => '2023-02-04 06:48:17', 'updated_at' => '2023-02-19 08:42:24', 'deleted_at' => NULL),
            array('id' => '9', 'entity' => 'order_code_start', 'value' => '1', 'created_at' => '2023-02-04 06:48:17', 'updated_at' => '2023-02-04 06:51:38', 'deleted_at' => NULL),
            array('id' => '10', 'entity' => 'system_title', 'value' => 'Интернет магазин', 'created_at' => '2023-02-05 06:48:44', 'updated_at' => '2023-03-07 06:46:14', 'deleted_at' => NULL),
            array('id' => '11', 'entity' => 'title_separator', 'value' => ':', 'created_at' => '2023-02-05 06:48:44', 'updated_at' => '2023-02-05 06:48:44', 'deleted_at' => NULL),
            array('id' => '12', 'entity' => 'site_address', 'value' => 'Р.Татарстан, Казань, Арбузова 9', 'created_at' => '2023-02-05 06:49:15', 'updated_at' => '2023-02-05 06:49:15', 'deleted_at' => NULL),
            array('id' => '13', 'entity' => 'registration_with', 'value' => 'email', 'created_at' => '2023-02-18 09:10:22', 'updated_at' => '2023-02-18 09:10:22', 'deleted_at' => NULL),
            array('id' => '14', 'entity' => 'registration_verification_with', 'value' => 'disable', 'created_at' => '2023-02-18 09:10:22', 'updated_at' => '2023-02-18 09:10:22', 'deleted_at' => NULL),
            array('id' => '15', 'entity' => 'topbar_welcome_text', 'value' => 'Добро пожаловать в наш магазин', 'created_at' => '2023-02-20 06:41:46', 'updated_at' => '2023-02-20 06:41:46', 'deleted_at' => NULL),
            array('id' => '16', 'entity' => 'topbar_email', 'value' => 'shop@mail.ru', 'created_at' => '2023-02-20 06:41:46', 'updated_at' => '2023-02-20 06:41:46', 'deleted_at' => NULL),
            array('id' => '17', 'entity' => 'topbar_location', 'value' => 'Татарстан, Казань, Россия - 254230', 'created_at' => '2023-02-20 06:41:46', 'updated_at' => '2023-02-20 06:41:46', 'deleted_at' => NULL),
            array('id' => '18', 'entity' => 'navbar_logo', 'value' => '1', 'created_at' => '2023-02-20 06:41:46', 'updated_at' => '2023-03-12 05:04:45', 'deleted_at' => NULL),
            array('id' => '19', 'entity' => 'navbar_categories', 'value' => NULL, 'created_at' => '2023-02-20 06:41:46', 'updated_at' => '2023-03-12 05:04:45', 'deleted_at' => NULL),
            array('id' => '20', 'entity' => 'navbar_pages', 'value' => '["1"]', 'created_at' => '2023-02-20 06:41:47', 'updated_at' => '2023-03-01 09:32:34', 'deleted_at' => NULL),
            array('id' => '21', 'entity' => 'navbar_contact_number', 'value' => '+7 919 058 4567', 'created_at' => '2023-02-20 06:41:47', 'updated_at' => '2023-02-20 06:41:47', 'deleted_at' => NULL),
            array('id' => '22', 'entity' => 'hero_sliders', 'value' => '[{"id":106549,"sub_title":"Натуральные 100% органические продукты","title":"Свежие продуктовые товары онлайн","text":"Настойчиво ориентируйемся на рыночный интеллектуальный капитал с помощью глобального подхода к человеческому капиталу..","image":"39","link":"https:\\/\\/www.youtube.com\\/watch?v=mZ77D66ZYtw"}]', 'created_at' => '2023-02-20 11:36:00', 'updated_at' => '2023-03-01 08:33:57', 'deleted_at' => NULL),
            array('id' => '24', 'entity' => 'top_category_ids', 'value' => '["6","5","4","3","2"]', 'created_at' => '2023-02-25 09:29:10', 'updated_at' => '2023-02-25 09:29:10', 'deleted_at' => NULL),
            array('id' => '25', 'entity' => 'featured_sub_title', 'value' => 'Обмен мнениями о платформе с помощью эффективных информационных посредников Динамическое внедрение.', 'created_at' => '2023-02-25 10:18:46', 'updated_at' => '2023-02-25 10:18:46', 'deleted_at' => NULL),
            array('id' => '26', 'entity' => 'featured_products_left', 'value' => '["1","2","5"]', 'created_at' => '2023-02-25 10:18:46', 'updated_at' => '2023-02-26 04:38:23', 'deleted_at' => NULL),
            array('id' => '27', 'entity' => 'featured_products_right', 'value' => '["2","3","4"]', 'created_at' => '2023-02-25 10:18:46', 'updated_at' => '2023-02-25 12:53:03', 'deleted_at' => NULL),
            array('id' => '28', 'entity' => 'featured_center_banner', 'value' => '', 'created_at' => '2023-02-25 10:18:46', 'updated_at' => '2023-02-25 11:01:42', 'deleted_at' => NULL),
            array('id' => '29', 'entity' => 'featured_banner_link', 'value' => 'http://enmart.work/products', 'created_at' => '2023-02-25 10:23:47', 'updated_at' => '2023-02-25 10:23:47', 'deleted_at' => NULL),
            array('id' => '30', 'entity' => 'trending_product_categories', 'value' => '["5","4","3"]', 'created_at' => '2023-02-26 05:35:01', 'updated_at' => '2023-02-26 05:35:01', 'deleted_at' => NULL),
            array('id' => '31', 'entity' => 'top_trending_products', 'value' => '["1","2","3","4","5"]', 'created_at' => '2023-02-26 05:35:01', 'updated_at' => '2023-03-08 12:10:00', 'deleted_at' => NULL),
            array('id' => '32', 'entity' => 'banner_section_one_banners', 'value' => '[]', 'created_at' => '2023-02-26 06:44:06', 'updated_at' => '2023-03-12 04:54:15', 'deleted_at' => NULL),
            array('id' => '33', 'entity' => 'best_deal_end_date', 'value' => '03/31/2023', 'created_at' => '2023-02-26 09:38:19', 'updated_at' => '2023-02-26 09:44:19', 'deleted_at' => NULL),
            array('id' => '34', 'entity' => 'weekly_best_deals', 'value' => '["1","2","4","5"]', 'created_at' => '2023-02-26 09:38:19', 'updated_at' => '2023-02-26 09:53:35', 'deleted_at' => NULL),
            array('id' => '35', 'entity' => 'best_deal_banner', 'value' => '', 'created_at' => '2023-02-26 09:38:19', 'updated_at' => '2023-02-26 09:38:19', 'deleted_at' => NULL),
            array('id' => '36', 'entity' => 'best_deal_banner_link', 'value' => NULL, 'created_at' => '2023-02-26 09:38:19', 'updated_at' => '2023-02-26 09:38:19', 'deleted_at' => NULL),
            array('id' => '37', 'entity' => 'banner_section_two_banner_one_link', 'value' => NULL, 'created_at' => '2023-02-26 10:11:59', 'updated_at' => '2023-02-26 10:11:59', 'deleted_at' => NULL),
            array('id' => '38', 'entity' => 'banner_section_two_banner_one', 'value' => '49', 'created_at' => '2023-02-26 10:11:59', 'updated_at' => '2023-02-26 10:11:59', 'deleted_at' => NULL),
            array('id' => '39', 'entity' => 'banner_section_two_banner_two_link', 'value' => NULL, 'created_at' => '2023-02-26 10:11:59', 'updated_at' => '2023-02-26 10:11:59', 'deleted_at' => NULL),
            array('id' => '40', 'entity' => 'banner_section_two_banner_two', 'value' => '50', 'created_at' => '2023-02-26 10:11:59', 'updated_at' => '2023-02-26 10:11:59', 'deleted_at' => NULL),
            array('id' => '41', 'entity' => 'client_feedback', 'value' => '[]', 'created_at' => '2023-02-26 13:16:47', 'updated_at' => '2023-03-12 04:54:40', 'deleted_at' => NULL),
            array('id' => '42', 'entity' => 'best_selling_products', 'value' => '["1","2","3"]', 'created_at' => '2023-02-27 06:01:19', 'updated_at' => '2023-02-27 06:01:19', 'deleted_at' => NULL),
            array('id' => '43', 'entity' => 'best_selling_banner', 'value' => '', 'created_at' => '2023-02-27 06:01:19', 'updated_at' => '2023-02-27 06:11:30', 'deleted_at' => NULL),
            array('id' => '44', 'entity' => 'best_selling_banner_link', 'value' => NULL, 'created_at' => '2023-02-27 06:01:19', 'updated_at' => '2023-02-27 06:01:19', 'deleted_at' => NULL),
            array('id' => '45', 'entity' => 'product_listing_categories', 'value' => '["6","5","4","3","2"]', 'created_at' => '2023-02-27 06:47:35', 'updated_at' => '2023-02-27 06:47:35', 'deleted_at' => NULL),
            array('id' => '46', 'entity' => 'footer_categories', 'value' => NULL, 'created_at' => '2023-03-01 04:33:33', 'updated_at' => '2023-03-12 04:59:31', 'deleted_at' => NULL),
            array('id' => '47', 'entity' => 'quick_links', 'value' => '["2"]', 'created_at' => '2023-03-01 04:33:33', 'updated_at' => '2023-03-01 04:33:33', 'deleted_at' => NULL),
            array('id' => '48', 'entity' => 'footer_logo', 'value' => '2', 'created_at' => '2023-03-01 04:33:33', 'updated_at' => '2023-03-12 05:05:55', 'deleted_at' => NULL),
            array('id' => '49', 'entity' => 'accepted_payment_banner', 'value' => '3', 'created_at' => '2023-03-01 04:33:33', 'updated_at' => '2023-03-12 05:05:55', 'deleted_at' => NULL),
            array('id' => '50', 'entity' => 'copyright_text', 'value' => '© Разработано студентами GB 💕  <b><font color="#ff9c00">Agile Team</font></b>', 'created_at' => '2023-03-01 04:49:42', 'updated_at' => '2023-03-12 04:59:31', 'deleted_at' => NULL),
            array('id' => '51', 'entity' => 'product_page_widgets', 'value' => '[]', 'created_at' => '2023-03-01 08:35:08', 'updated_at' => '2023-03-12 04:56:25', 'deleted_at' => NULL),
            array('id' => '52', 'entity' => 'product_page_banner_link', 'value' => NULL, 'created_at' => '2023-03-01 09:20:50', 'updated_at' => '2023-03-01 09:20:50', 'deleted_at' => NULL),
            array('id' => '53', 'entity' => 'product_page_banner', 'value' => '59', 'created_at' => '2023-03-01 09:20:50', 'updated_at' => '2023-03-01 09:20:50', 'deleted_at' => NULL),
            array('id' => '54', 'entity' => 'facebook_link', 'value' => 'https://www.facebook.com/', 'created_at' => '2023-03-01 09:45:01', 'updated_at' => '2023-03-01 09:45:01', 'deleted_at' => NULL),
            array('id' => '55', 'entity' => 'twitter_link', 'value' => 'https://twitter.com/', 'created_at' => '2023-03-01 09:45:01', 'updated_at' => '2023-03-01 09:45:01', 'deleted_at' => NULL),
            array('id' => '56', 'entity' => 'linkedin_link', 'value' => 'https://www.linkedin.com/', 'created_at' => '2023-03-01 09:45:01', 'updated_at' => '2023-03-01 09:45:01', 'deleted_at' => NULL),
            array('id' => '57', 'entity' => 'youtube_link', 'value' => 'https://www.youtube.com/', 'created_at' => '2023-03-01 09:45:01', 'updated_at' => '2023-03-01 09:45:01', 'deleted_at' => NULL),
            array('id' => '58', 'entity' => 'about_us', 'value' => 'Объясним вам, как родилось все это ошибочное осуждение удовольствия и восхваление боли, и мы дадим вам полный отчет о системе и изложим настоящие учения.
          Ошибочное осуждение удовольствия и восхваление боли родилось, и мы дадим вам полное изложение системы.', 'created_at' => '2023-03-01 09:46:33', 'updated_at' => '2023-03-01 09:46:33', 'deleted_at' => NULL),
            array('id' => '59', 'entity' => 'about_intro_sub_title', 'value' => '100% органические продукты питания', 'created_at' => '2023-03-04 04:54:12', 'updated_at' => '2023-03-04 04:54:12', 'deleted_at' => NULL),
            array('id' => '60', 'entity' => 'about_intro_title', 'value' => 'Будте здоровы и <br> еште свежую органическую пищу', 'created_at' => '2023-03-04 04:54:12', 'updated_at' => '2023-03-11 05:49:49', 'deleted_at' => NULL),
            array('id' => '61', 'entity' => 'about_intro_text', 'value' => 'Assertively target market lorem ipsum is simply free text available dolor sit amet, consectetur notted adipisicing elit sed do eiusmod tempor incididunt simply freeutation labore et dolore.', 'created_at' => '2023-03-04 04:54:12', 'updated_at' => '2023-03-04 04:54:12', 'deleted_at' => NULL),
            array('id' => '62', 'entity' => 'about_intro_mission', 'value' => 'Continually transform virtual meta- methodologies. leverage existing alignments.', 'created_at' => '2023-03-04 04:54:12', 'updated_at' => '2023-03-04 04:54:12', 'deleted_at' => NULL),
            array('id' => '63', 'entity' => 'about_intro_vision', 'value' => 'Continually transform virtual meta- methodologies. leverage existing alignments.', 'created_at' => '2023-03-04 04:54:12', 'updated_at' => '2023-03-04 04:54:12', 'deleted_at' => NULL),
            array('id' => '64', 'entity' => 'about_intro_quote', 'value' => 'Assertively target market Lorem ipsum is simply free consectetur notted elit sed do eiusmod', 'created_at' => '2023-03-04 04:54:12', 'updated_at' => '2023-03-04 04:54:12', 'deleted_at' => NULL),
            array('id' => '65', 'entity' => 'about_intro_quote_by', 'value' => 'George Scholll', 'created_at' => '2023-03-04 04:54:12', 'updated_at' => '2023-03-04 04:54:12', 'deleted_at' => NULL),
            array('id' => '66', 'entity' => 'about_intro_image', 'value' => '60', 'created_at' => '2023-03-04 04:54:12', 'updated_at' => '2023-03-04 04:54:12', 'deleted_at' => NULL),
            array('id' => '67', 'entity' => 'about_popular_brand_ids', 'value' => '["1","2"]', 'created_at' => '2023-03-04 05:16:59', 'updated_at' => '2023-03-04 05:16:59', 'deleted_at' => NULL),
            array('id' => '68', 'entity' => 'about_features_title', 'value' => 'Our Working Ability', 'created_at' => '2023-03-04 05:49:27', 'updated_at' => '2023-03-04 05:49:27', 'deleted_at' => NULL),
            array('id' => '69', 'entity' => 'about_features_sub_title', 'value' => 'Assertively target market lorem ipsum is simply free text available dolor incididunt simply free ut labore et dolore.', 'created_at' => '2023-03-04 05:49:27', 'updated_at' => '2023-03-04 05:49:27', 'deleted_at' => NULL),
            array('id' => '70', 'entity' => 'about_us_features', 'value' => '[]', 'created_at' => '2023-03-04 05:59:50', 'updated_at' => '2023-03-12 04:57:12', 'deleted_at' => NULL),
            array('id' => '71', 'entity' => 'about_why_choose_sub_title', 'value' => 'Почему выбирают нас', 'created_at' => '2023-03-04 06:59:45', 'updated_at' => '2023-03-04 06:59:45', 'deleted_at' => NULL),
            array('id' => '72', 'entity' => 'about_why_choose_title', 'value' => 'Мы не покупаем на<br> Открытом рынке', 'created_at' => '2023-03-04 06:59:45', 'updated_at' => '2023-03-04 06:59:45', 'deleted_at' => NULL),
            array('id' => '73', 'entity' => 'about_why_choose_text', 'value' => 'Привлекательно формируйте интерактивные возможности и мультимедиа для независимого электронного бизнеса.', 'created_at' => '2023-03-04 06:59:45', 'updated_at' => '2023-03-04 06:59:45', 'deleted_at' => NULL),
            array('id' => '74', 'entity' => 'about_why_choose_banner', 'value' => '62', 'created_at' => '2023-03-04 06:59:45', 'updated_at' => '2023-03-04 06:59:45', 'deleted_at' => NULL),
            array('id' => '75', 'entity' => 'about_us_why_choose_us', 'value' => '[]', 'created_at' => '2023-03-04 07:05:13', 'updated_at' => '2023-03-12 04:57:43', 'deleted_at' => NULL),
            array('id' => '76', 'entity' => 'admin_panel_logo', 'value' => '4', 'created_at' => '2023-03-04 09:37:03', 'updated_at' => '2023-03-12 05:08:21', 'deleted_at' => NULL),
            array('id' => '77', 'entity' => 'favicon', 'value' => '5', 'created_at' => '2023-03-04 09:37:03', 'updated_at' => '2023-03-12 05:08:21', 'deleted_at' => NULL),
            array('id' => '78', 'entity' => 'invoice_thanksgiving', 'value' => 'Спасибо за покупку в нашем магазине и за ваш заказ. это действительно здорово, что вы являетесь одним из наших платных пользователей. Мы надеемся, что вы останетесь довольны Qlearly, если у вас возникнут вопросы,предложения или проблемы, пожалуйста, не стесняйтесь обращаться к нам.', 'created_at' => '2023-03-07 07:04:15', 'updated_at' => '2023-03-07 07:09:20', 'deleted_at' => NULL)
        ));
    }
}
