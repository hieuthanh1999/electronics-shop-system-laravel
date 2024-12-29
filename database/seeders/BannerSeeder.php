<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    public function run()
    {
        Banner::create([
            'title' => 'Banner 1',
            'image' => 'banner1.jpg',
            'description' => 'This is the first banner.',
            'status' => 1,
        ]);

        Banner::create([
            'title' => 'Banner 2',
            'image' => 'banner2.jpg',
            'description' => 'This is the second banner.',
            'status' => 1,
        ]);
    }
}
