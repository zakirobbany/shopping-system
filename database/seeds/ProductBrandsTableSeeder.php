<?php

use Illuminate\Database\Seeder;

class ProductBrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('product_brands')->truncate();
        Schema::enableForeignKeyConstraints();

        $productBrands = [
            [
                'name' => 'Semen Gresik',
            ],
            [
                'name' => 'Blind Rivet',
            ],
        ];

        $now = \Carbon\Carbon::now();
        foreach ($productBrands as $productBrand) {
            DB::table('product_brands')->insert([
                'name' => $productBrand['name'],
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
}
