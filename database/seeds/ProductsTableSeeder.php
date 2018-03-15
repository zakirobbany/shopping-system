<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('products')->truncate();
        Schema::enableForeignKeyConstraints();

        $products = [
            [
                'name' => 'Semen Gresik',
                'modal_price' => 50000,
                'sell_price' => 55000,
                'quantity' => 500,
                'brand' => 1,
                'type' => 1,
                'description' => '',
            ],
            [
                'name' => 'Paku Payung',
                'modal_price' => 800,
                'sell_price' => 1000,
                'quantity' => 5000,
                'brand' => 2,
                'type' => 2,
                'description' => '',
            ],
            [
                'name' => 'Lampu Bulat',
                'modal_price' => 33000,
                'sell_price' => 35000,
                'quantity' => 100,
                'brand' => 3,
                'type' => 1,
                'description' => '30 watt',
            ],
        ];

        $now = \Carbon\Carbon::now();

        foreach ($products as $product) {
            DB::table('products')->insert([
                'name' => $product['name'],
                'modal_price' => $product['modal_price'],
                'sell_price' => $product['sell_price'],
                'quantity' => $product['quantity'],
                'product_type_id' => $product['type'],
                'product_brand_id' => $product['brand'],
                'description' => $product['description'],
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
}
