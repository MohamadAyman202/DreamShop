<?php

namespace Database\Seeders;

use App\Models\Home_slider;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\type;

class HomeSliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $homeSliders = [
            [
                'id' => 1,
                'type' => Config::get('constants.homeSlider.MAIN'),
                'images' => 'uploads/slider-1.webp',
                'title' => 'Winter sale',
                'source_type' => 1,
                'status' => 1,
                'type' => 1,
                'admin_id' => 1
            ],
            [
                'id' => 2,
                'type' => Config::get('constants.homeSlider.MAIN'),
                'images' => 'uploads/slider-2.webp',
                'title' => 'Flash 50 % off',
                'source_type' => 1,
                'status' => 1,
                'type' => 1,
                'admin_id' => 1
            ],
            [
                'id' => 3,
                'type' => Config::get('constants.homeSlider.MAIN'),
                'images' => 'uploads/slider-3.webp',
                'title' => 'Black Friday Discount',
                'source_type' => 1,
                'status' => 1,
                'type' => 1,
                'admin_id' => 1
            ],
            [
                'id' => 4,
                'type' => Config::get('constants.homeSlider.RIGHT_TOP'),
                'images' => 'uploads/slider-4.webp',
                'title' => 'Backpack for Men',
                'source_type' => 4,
                'status' => 1,
                'type' => 2,
                'admin_id' => 1
            ],
            [
                'id' => 5,
                'type' => Config::get('constants.homeSlider.RIGHT_BOTTOM'),
                'images' => 'uploads/slider-5.webp',
                'title' => 'Puma Stylist Shoes',
                'source_type' => 2,
                'status' => 1,
                'type' => 3,
                'admin_id' => 1
            ]
        ];

        foreach ($homeSliders as $i) {
            Home_slider::create($i);
        }

        // Source seeders for main slider images
        $categorySource = [
            [
                'category_id' => 63082111,
                'home_slider_id' => 1
            ],
            [
                'category_id' => 63082112,
                'home_slider_id' => 1
            ],
            [
                'category_id' => 72531153,
                'home_slider_id' => 1
            ],
            [
                'category_id' => 61952111,
                'home_slider_id' => 2
            ],
            [
                'category_id' => 72531153,
                'home_slider_id' => 2
            ],
            [
                'category_id' => 63082111,
                'home_slider_id' => 3
            ],
            [
                'category_id' => 61952111,
                'home_slider_id' => 3
            ]
        ];
        foreach ($categorySource as $i) {
            DB::table('home_slider_categories')->insert($i);
        }

        // Source seeders for slider images right top
        $subCategorySource = [
            [
                'sub_category_id' => 97373117,
                'home_slider_id' => 4
            ],
            [
                'sub_category_id' => 73294112,
                'home_slider_id' => 4
            ],
            [
                'sub_category_id' => 96765129,
                'home_slider_id' => 4
            ],
            [
                'sub_category_id' => 96765126,
                'home_slider_id' => 4
            ]
        ];
        foreach ($subCategorySource as $i) {
            DB::table('home_slider_sub_categories')->insert($i);
        }

        // Source seeders for slider images right top
        $bandSource = [
            [
                'brand_id' => 9442200,
                'home_slider_id' => 5
            ],
            [
                'brand_id' => 9442201,
                'home_slider_id' => 5
            ],
            [
                'brand_id' => 9442202,
                'home_slider_id' => 5
            ],
            [
                'brand_id' => 9442203,
                'home_slider_id' => 5
            ]
        ];
        foreach ($bandSource as $i) {
            DB::table('home_slider_brands')->insert($i);
        }
    }
}
