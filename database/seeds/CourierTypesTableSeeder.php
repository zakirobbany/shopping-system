<?php

use Illuminate\Database\Seeder;

class CourierTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('courier_types')->truncate();
        Schema::enableForeignKeyConstraints();

        $courierTypes = [
            [
                'name' => 'Odong-odong',
            ],
            [
                'name' => 'Pick Up',
            ],
        ];

        $now = \Carbon\Carbon::now();
        foreach ($courierTypes as $courierType) {
            DB::table('courier_types')->insert([
                'name' => $courierType['name'],
                'updated_at' => $now,
                'created_at' => $now,
            ]);
        };
    }
}
