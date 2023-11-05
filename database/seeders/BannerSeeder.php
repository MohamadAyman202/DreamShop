<?php

namespace Database\Seeders;

use App\Models\Banner;
use App\Models\BannerSourceBrand;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $banners = [
            [
                'id' => 1,
                'source_type' => 'Brands',
                'images' => 'uploads/banner-1.webp',
                'title' => 'Sale',
                'type' => 'Beside featured brands',
                'status' => 1,

                'admin_id' => 1
            ],
            [
                'id' => 2,
                'source_type' => 'Brands',
                'images' => 'uploads/banner-2.webp',
                'title' => 'Voucher',

                'type' => 'Bottom of flash sale section',
                'status' => 1,

                'admin_id' => 1
            ],
            [
                'id' => 3,
                'source_type' => 'Brands',
                'images' => 'uploads/banner-3.webp',
                'title' => 'Discount',
                'type' => 'Bottom of flash sale section',
                'status' => 1,

                'admin_id' => 1
            ],
            [
                'id' => 4,
                'source_type' => 'Brands',
                'images' => 'uploads/banner-4.webp',
                'title' => 'Black friday',
                'type' => 'Bottom of flash sale section',
                'status' => 1,

                'admin_id' => 1
            ],
            [
                'id' => 5,
                'source_type' => 'Brands',
                'images' => 'uploads/banner-5.webp',
                'title' => 'Summer fashion',
                'type' => 'Top of daily discover',
                'status' => 1,

                'admin_id' => 1
            ],
            [
                'id' => 6,
                'source_type' => 'Brands',
                'images' => 'uploads/banner-6.webp',
                'title' => 'Autumn Offer',
                'type' => 'Bottom of daily discover',
                'status' => 1,
                'admin_id' => 1
            ],
            [
                'id' => 7,
                'source_type' => 'Brands',
                'images' => 'uploads/banner-7.webp',
                'title' => 'Christmas Offer',
                'type' => 'Detail page(beside rating)',
                'status' => 1,
                'admin_id' => 1
            ],
            [
                'id' => 8,
                'source_type' => 'Brands',
                'images' => 'uploads/banner-8.webp',
                'title' => '45% Off',
                'type' => 'Top banner',
                'status' => 1,
                'admin_id' => 1
            ],
            [
                'id' => 9,
                'source_type' => 'Brands',
                'images' => 'uploads/banner-9.png',
                'title' => 'Free shipping',
                'type' => 'Popup banner',
                'status' => 1,
                'admin_id' => 1
            ]
        ];

        foreach ($banners as $i) {
            Banner::create($i);
        }

        // Source seeders for slider images right top
        $bandSource = [
            [
                'brand_id' => 9442200,
                'banner_id' => 1
            ],
            [
                'brand_id' => 9442201,
                'banner_id' => 1
            ],
            [
                'brand_id' => 9442202,
                'banner_id' => 1
            ],
            [
                'brand_id' => 9442203,
                'banner_id' => 1
            ]
        ];
        foreach ($bandSource as $i) {
            DB::table('banner_source_brands')->insert($i);
        }
    }
}
