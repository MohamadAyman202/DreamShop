<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Helper\Utils;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            [
                'id' => 9442200,
                'title' => 'Levi\'s',
                'images' => 'uploads/default-image.webp',
                'status' => 1,
                'featured' => 1,
                'admin_id' => 1
            ],
            [
                'id' => 9442201,
                'title' => 'Addidas',
                'images' => 'uploads/default-image.webp',
                'status' => 1,
                'featured' => 1,
                'admin_id' => 1
            ],
            [
                'id' => 9442202,
                'title' => 'H&M',
                'images' => 'uploads/default-image.webp',
                'status' => 1,
                'featured' => 1,
                'admin_id' => 1
            ],
            [
                'id' => 9442203,
                'title' => 'Rolex',
                'images' => 'uploads/default-image.webp',
                'status' => 1,
                'featured' => 1,
                'admin_id' => 1
            ],

            [
                'id' => 9442204,
                'title' => 'Apple',
                'images' => 'uploads/default-image.webp',
                'status' => 1,
                'featured' => 1,
                'admin_id' => 1
            ],
            [
                'id' => 9442205,
                'title' => 'Gucci',
                'images' => 'uploads/default-image.webp',
                'status' => 1,
                'featured' => 1,
                'admin_id' => 1
            ],
            [
                'id' => 9442206,
                'title' => 'Schnell',
                'images' => 'uploads/default-image.webp',
                'status' => 1,
                'featured' => 1,
                'admin_id' => 1
            ],
            [
                'id' => 9442207,
                'title' => 'Zara',
                'images' => 'uploads/default-image.webp',
                'status' => 1,
                'featured' => 1,
                'admin_id' => 1
            ],
            [
                'id' => 9442208,
                'title' => 'Nike',
                'images' => 'uploads/default-image.webp',
                'status' => 1,
                'featured' => 1,
                'admin_id' => 1
            ],
            [
                'id' => 9442209,
                'title' => 'Gillette',
                'images' => 'uploads/default-image.webp',
                'status' => 1,
                'featured' => 1,
                'admin_id' => 1
            ],
            [
                'id' => 9442210,
                'title' => 'Accenture',
                'images' => 'uploads/default-image.webp',
                'status' => 1,
                'featured' => 1,
                'admin_id' => 1
            ],
            [
                'id' => 9442211,
                'title' => 'Nescafe',
                'images' => 'uploads/default-image.webp',
                'status' => 1,
                'featured' => 1,
                'admin_id' => 1
            ],
            [
                'id' => 9442212,
                'title' => 'Loreal',
                'images' => 'uploads/default-image.webp',
                'status' => 1,
                'featured' => 1,
                'admin_id' => 1
            ]

        ];

        foreach ($items as $i) {
            Brand::create($i);
        }
    }
}
