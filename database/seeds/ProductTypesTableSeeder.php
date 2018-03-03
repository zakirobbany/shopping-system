<?php

use Illuminate\Database\Seeder;

class ProductTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('product_types')->truncate();
        Schema::enableForeignKeyConstraints();

        $productTypes = [
            [
                'name' => 'Satuan',
            ],
            [
                'name' => 'Gram',
            ],
        ];

        $now = \Carbon\Carbon::now();
        foreach ($productTypes as $productType) {
            DB::table('product_types')->insert([
                'name' => $productType['name'],
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
}
