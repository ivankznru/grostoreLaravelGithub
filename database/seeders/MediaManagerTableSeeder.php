<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MediaManagerTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('media_managers')->delete();

        \DB::table('media_managers')->insert(array(
            0 =>
            array('id' => '1', 'user_id' => '1', 'media_file' => 'uploads/media/6AkCyw6sfJrIG2NR2MuAzGRtkA48Rmgj8ND2Hc1k.png', 'media_size' => '1916', 'media_type' => 'image', 'media_name' => 'logo.png', 'media_extension' => 'png', 'created_at' => '2023-03-12 05:04:37', 'updated_at' => '2023-03-12 05:04:37', 'deleted_at' => NULL),
            array('id' => '2', 'user_id' => '1', 'media_file' => 'uploads/media/ZithHqXrynYP6nkIfU0ei7VtWRMvuObOGd0P2tdR.png', 'media_size' => '1055', 'media_type' => 'image', 'media_name' => 'logo-white.png', 'media_extension' => 'png', 'created_at' => '2023-03-12 05:05:28', 'updated_at' => '2023-03-12 05:05:28', 'deleted_at' => NULL),
            array('id' => '3', 'user_id' => '1', 'media_file' => 'uploads/media/3WOll3QyXt5f9NNi22BRANFNCTNQRey75DYAOXd4.png', 'media_size' => '4430', 'media_type' => 'image', 'media_name' => 'payments.png', 'media_extension' => 'png', 'created_at' => '2023-03-12 05:05:48', 'updated_at' => '2023-03-12 05:05:48', 'deleted_at' => NULL),
            array('id' => '4', 'user_id' => '1', 'media_file' => 'uploads/media/LOa3BqX3ydhVC0V1fwYEyvEpM5N9NaoA0E7u3EQs.png', 'media_size' => '1742', 'media_type' => 'image', 'media_name' => 'logo.png', 'media_extension' => 'png', 'created_at' => '2023-03-12 05:07:45', 'updated_at' => '2023-03-12 05:07:45', 'deleted_at' => NULL),
            array('id' => '5', 'user_id' => '1', 'media_file' => 'uploads/media/yqqPV512Gk5DMpvCj2UllKrCl52bam3yD6QvfiPP.png', 'media_size' => '753', 'media_type' => 'image', 'media_name' => 'favicon.png', 'media_extension' => 'png', 'created_at' => '2023-03-12 05:08:14', 'updated_at' => '2023-03-12 05:08:14', 'deleted_at' => NULL),
            array('id' => '6', 'user_id' => '1', 'media_file' => 'uploads/media/dtkoInw3SD3IF3Q2I1jFtEDiE96mDD46RHB9RdxN.jpg', 'media_size' => '6502', 'media_type' => 'image', 'media_name' => '1.jpg', 'media_extension' => 'jpg', 'created_at' => '2023-03-12 05:08:43', 'updated_at' => '2023-03-12 05:08:43', 'deleted_at' => NULL),
        //
            array('id' => '7', 'user_id' => '1', 'media_file' => 'uploads/media/DEiGHWlSi1PxUNj3RGLj18Le2VOTCnRYmGn2fokt.png', 'media_size' => '1966', 'media_type' => 'image', 'media_name' => 'milk.png', 'media_extension' => 'png', 'created_at' => '2023-04-27 07:03:46', 'updated_at' => '2023-04-27 07:03:46', 'deleted_at' => NULL),
            array('id' => '8', 'user_id' => '1', 'media_file' => 'uploads/media/OZ5pfXMjQoDcpWbOG9cgTZAKX4UVhzenP6UPC0Is.png', 'media_size' => '1808', 'media_type' => 'image', 'media_name' => 'meat and fish.png', 'media_extension' => 'png', 'created_at' => '2023-04-27 07:05:19', 'updated_at' => '2023-04-27 07:05:19', 'deleted_at' => NULL),
            array('id' => '9', 'user_id' => '1', 'media_file' => 'uploads/media/49VKg0l0ardv9PL6UZY0EHAsLp2SoMI0OkIr0QKZ.png', 'media_size' => '2270', 'media_type' => 'image', 'media_name' => 'bakery and biscuits.png', 'media_extension' => 'png', 'created_at' => '2023-04-27 07:03:46', 'updated_at' => '2023-04-27 07:03:46', 'deleted_at' => NULL),
            array('id' => '10', 'user_id' => '1', 'media_file' => 'uploads/media/hpZpGxjmzUznhQrvozy0w675pHgfwOIbRayvBXHl.png', 'media_size' => '2520', 'media_type' => 'image', 'media_name' => 'beauty and health.png', 'media_extension' => 'png', 'created_at' => '2023-04-27 07:03:46', 'updated_at' => '2023-04-27 07:03:46', 'deleted_at' => NULL),
            array('id' => '11', 'user_id' => '1', 'media_file' => 'uploads/media/EN3IBYTOzAcdF3JyXLf3HiOxLqQ1PtPXskCzsxzT.png', 'media_size' => '1611', 'media_type' => 'image', 'media_name' => 'cleaning.png', 'media_extension' => 'png', 'created_at' => '2023-04-27 07:03:46', 'updated_at' => '2023-04-27 07:03:46', 'deleted_at' => NULL),
            array('id' => '12', 'user_id' => '1', 'media_file' => 'uploads/media/tyhAHmDgJG0hKcQ4UxaRY2wiz2RoxdJoKQk7GevO.png', 'media_size' => '2094', 'media_type' => 'image', 'media_name' => 'breakfast.png', 'media_extension' => 'png', 'created_at' => '2023-04-27 07:03:46', 'updated_at' => '2023-04-27 07:03:46', 'deleted_at' => NULL),
            array('id' => '13', 'user_id' => '1', 'media_file' => 'uploads/media/MauEdcKvUleH0wKFUvNbjVkVu8bByUFs9KFF752Z.png', 'media_size' => '2214', 'media_type' => 'image', 'media_name' => 'baby care.png', 'media_extension' => 'png', 'created_at' => '2023-04-27 07:03:46', 'updated_at' => '2023-04-27 07:03:46', 'deleted_at' => NULL),
            array('id' => '14', 'user_id' => '1', 'media_file' => 'uploads/media/018PNNAnjMLGmiyBdmMKgbpamt89fw3xl7acLDIw.png', 'media_size' => '2185', 'media_type' => 'image', 'media_name' => 'pet care.png', 'media_extension' => 'png', 'created_at' => '2023-04-27 07:03:46', 'updated_at' => '2023-04-27 07:03:46', 'deleted_at' => NULL),
            array('id' => '15', 'user_id' => '1', 'media_file' => 'uploads/media/MUAzxmO6s0RhL6Vaj2XTmjxbZ5iiblPeS9jOdSBs.png', 'media_size' => '1733', 'media_type' => 'image', 'media_name' => 'jam and jelly.png', 'media_extension' => 'png', 'created_at' => '2023-04-27 07:03:46', 'updated_at' => '2023-04-27 07:03:46', 'deleted_at' => NULL),
            array('id' => '16', 'user_id' => '1', 'media_file' => 'uploads/media/WCnSqq0xHdUHbrKEcsh5qBOCHSyHeFNbwhZSwj6O.png', 'media_size' => '1934', 'media_type' => 'image', 'media_name' => 'honey.png', 'media_extension' => 'png', 'created_at' => '2023-04-27 07:03:46', 'updated_at' => '2023-04-27 07:03:46', 'deleted_at' => NULL),
            array('id' => '17', 'user_id' => '1', 'media_file' => 'uploads/media/YzbdoaoYsOPHd0CZr9auhG3lWl5xPVV2Pv6279Kg.png', 'media_size' => '2320', 'media_type' => 'image', 'media_name' => 'cold drinks.png', 'media_extension' => 'png', 'created_at' => '2023-04-27 07:03:46', 'updated_at' => '2023-04-27 07:03:46', 'deleted_at' => NULL),
            array('id' => '18', 'user_id' => '1', 'media_file' => 'uploads/media/vw7BSe1jiRBzqOJEkczOuGBZqrai5uenUylDcXon.png', 'media_size' => '2734', 'media_type' => 'image', 'media_name' => 'fresh organic.png', 'media_extension' => 'png', 'created_at' => '2023-04-27 07:03:46', 'updated_at' => '2023-04-27 07:03:46', 'deleted_at' => NULL),
            array('id' => '19', 'user_id' => '1', 'media_file' => 'uploads/media/aucDTKGbZejGsZxG8m4q6WY9D0QlH18XOorsVsGo.png', 'media_size' => '1952', 'media_type' => 'image', 'media_name' => 'fresh fruits.png', 'media_extension' => 'png', 'created_at' => '2023-04-27 07:03:46', 'updated_at' => '2023-04-27 07:03:46', 'deleted_at' => NULL),
            array('id' => '20', 'user_id' => '1', 'media_file' => 'uploads/media/IS6uo4zlo4yglmcrVrEGFadmdTGVNKQvnGJ7C8eg.png', 'media_size' => '1869', 'media_type' => 'image', 'media_name' => 'coffee drinks.png', 'media_extension' => 'png', 'created_at' => '2023-04-27 07:03:46', 'updated_at' => '2023-04-27 07:03:46', 'deleted_at' => NULL),
            array('id' => '21', 'user_id' => '1', 'media_file' => 'uploads/media/rMrVqWkiVIj5yybFeynwqlrnTYh6K0ZkkTyscrXM.png', 'media_size' => '2363', 'media_type' => 'image', 'media_name' => 'vegetables.png', 'media_extension' => 'png', 'created_at' => '2023-04-27 07:03:46', 'updated_at' => '2023-04-27 07:03:46', 'deleted_at' => NULL),
            array('id' => '22', 'user_id' => '1', 'media_file' => 'uploads/media/ql7EsFU6Ld2SAmR1zOF4PVnlNkP6elZG6xpXw9Sf.png', 'media_size' => '256032', 'media_type' => 'image', 'media_name' => '3udU8bhCm9Nw5hI0kmzMAVtvDTTMK4zgxkes4gGt.png', 'media_extension' => 'png', 'created_at' => '2023-04-27 07:03:46', 'updated_at' => '2023-04-27 07:03:46', 'deleted_at' => NULL),
            array('id' => '23', 'user_id' => '1', 'media_file' => 'uploads/media/bCoR9wERaTeNNwf1TRQIMLwofL0jes4ZWtwDskvE.png', 'media_size' => '253107', 'media_type' => 'image', 'media_name' => 'LR485zSYiuFgnbAtJW3TzWiKVgaFTjExC01Nul9s.png', 'media_extension' => 'png', 'created_at' => '2023-04-27 07:03:46', 'updated_at' => '2023-04-27 07:03:46', 'deleted_at' => NULL),
            array('id' => '24', 'user_id' => '1', 'media_file' => 'uploads/media/koSWhQHGe93jg49XjDRVKxaOTaU874HOvydfjimh.png', 'media_size' => '210386', 'media_type' => 'image', 'media_name' => 'QRrqV5dcT0zLMPR7wNbRGGkSk9f16V3amjaKk4R8.png', 'media_extension' => 'png', 'created_at' => '2023-04-27 07:03:46', 'updated_at' => '2023-04-27 07:03:46', 'deleted_at' => NULL),
            array('id' => '25', 'user_id' => '1', 'media_file' => 'uploads/media/HtHQL83xtjtNTqnPv2FupwUij9teOzyhFnRhIwV6.png', 'media_size' => '169040', 'media_type' => 'image', 'media_name' => 'w7HF5KXNMxBUiXIW9whwO1dQG43wYVUgdMuPOcQh.png', 'media_extension' => 'png', 'created_at' => '2023-04-27 07:03:46', 'updated_at' => '2023-04-27 07:03:46', 'deleted_at' => NULL),
                )
        );
    }
}
