<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Page::create([
            'name_page'         => 'FAQ',
            'slug'              => Str::slug('faq'),
            'description_page'  => '',
            'content_page'      => '',
            'image_page'        => '',
            'creator_id'        => '1'
        ]);
    }
}
