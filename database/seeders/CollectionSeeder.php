<?php

namespace Database\Seeders;

use App\Models\Collection;
use Illuminate\Database\Seeder;

class CollectionSeeder extends Seeder
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
                'id' => 1,
                'title' => 'Featured products',
                'status' => 1,
                'admin_id' => 1
            ],
            [
                'id' => 2,
                'title' => 'Trending products',
                'status' => 1,
                'admin_id' => 1
            ],
            [
                'id' => 3,
                'title' => 'Top selling products',
                'status' => 1,
                'admin_id' => 1
            ]
        ];

        foreach ($items as $i) {
            Collection::create($i);
        }
    }
}
