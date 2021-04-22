<?php

namespace Database\Seeders;

use App\Models\Social;
use Illuminate\Database\Seeder;

class SocialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Social::create([
            'title_social' => 'facebook',
            'description_social' => 'icon link facebook',
            'icon_social' => '',
            'link_social' => 'https://id-id.facebook.com/pages/category/Government-Organization/Bea-Cukai-Kotabaru-1436837939680697/',
            'creator_id' => '1'
        ]);

        Social::create([
            'title_social' => 'twitter',
            'description_social' => 'icon link twitter',
            'icon_social' => '',
            'link_social' => 'https://twitter.com/bckotabaru',
            'creator_id' => '1'
        ]);

        Social::create([
            'title_social' => 'youtube',
            'description_social' => 'icon link youtube',
            'icon_social' => '',
            'link_social' => 'https://www.youtube.com/channel/UCfLGTQ6CEgLIa1DstHfLAzA',
            'creator_id' => '1'
        ]);

        Social::create([
            'title_social' => 'instagram',
            'description_social' => 'icon link instagram',
            'icon_social' => '',
            'link_social' => 'https://www.instagram.com/beacukai.kotabaru/?hl=en',
            'creator_id' => '1'
        ]);

    }
}
