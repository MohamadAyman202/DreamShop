<?php

namespace Database\Seeders;

use App\Models\CollectionWithProduct;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CollectionWithProductSeeder extends Seeder
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
                'collection_id' => 1,
                'product_id' => 88630111,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'collection_id' => 2,
                'product_id' => 88630112,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'collection_id' => 3,
                'product_id' => 88630113,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'collection_id' => 1,
                'product_id' => 88630114,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'collection_id' => 2,
                'product_id' => 88630115,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'collection_id' => 3,
                'product_id' => 88630116,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'collection_id' => 1,
                'product_id' => 88630117,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'collection_id' => 3,
                'product_id' => 88630119,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'collection_id' => 1,
                'product_id' => 88630120,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'collection_id' => 2,
                'product_id' => 88630121,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'collection_id' => 3,
                'product_id' => 88630122,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'collection_id' => 1,
                'product_id' => 88630123,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'collection_id' => 2,
                'product_id' => 88630124,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'collection_id' => 3,
                'product_id' => 88630125,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'collection_id' => 1,
                'product_id' => 88630126,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'collection_id' => 2,
                'product_id' => 88630127,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'collection_id' => 3,
                'product_id' => 88630128,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'collection_id' => 1,
                'product_id' => 88630129,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'collection_id' => 2,
                'product_id' => 88630130,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'collection_id' => 3,
                'product_id' => 88630131,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'collection_id' => 1,
                'product_id' => 88630132,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'collection_id' => 2,
                'product_id' => 88630133,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'collection_id' => 3,
                'product_id' => 88630134,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'collection_id' => 1,
                'product_id' => 88630135,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'collection_id' => 2,
                'product_id' => 88630136,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'collection_id' => 3,
                'product_id' => 88630137,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];

        foreach ($items as $i) {
            DB::table('collection_product')->insert([$i]);
        }
    }
}
