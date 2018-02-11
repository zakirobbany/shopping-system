<?php

use Illuminate\Database\Seeder;

class CouriersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('couriers')->truncate();
        Schema::enableForeignKeyConstraints();

        $couriers = [
            [
                'name' => 'Yetno',
                'address' => 'Karang Cempaka',
                'phone_number' => '089734458907',
                'courier_type_id' => 1,
            ],
            [
                'name' => 'Bus',
                'address' => 'Aengbaja Kenek',
                'phone_number' => '081705678987',
                'courier_type_id' => 2,
            ],
        ];

        $now = \Carbon\Carbon::now();
        foreach ($couriers as $courier) {
            DB::table('couriers')->insert([
                'name' => $courier['name'],
                'address' => $courier['address'],
                'phone_number' => $courier['phone_number'],
                'courier_type_id' => $courier['courier_type_id'],
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
}
