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
                'price' => 50000,
                'quantity' => 500,
                'brand' => 1,
                'type' => 1,
            ],
            [
                'name' => 'Paku Payung',
                'price' => 1000,
                'quantity' => 5000,
                'brand' => 2,
                'type' => 2,
            ],
        ];

        $now = \Carbon\Carbon::now();

        foreach ($products as $product) {
            DB::table('products')->insert([
                'name' => $product['name'],
                'price' => $product['price'],
                'quantity' => $product['quantity'],
                'product_type_id' => $product['type'],
                'product_brand_id' => $product['brand'],
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
}
