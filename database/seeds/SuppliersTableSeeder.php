<?php

use Illuminate\Database\Seeder;

class SuppliersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('suppliers')->truncate();

        $suppliers = [
            [
                'name' => 'Anggi',
                'address' => 'Surabaya',
                'phone_number' => '087678567456',
            ],
            [
                'name' => 'Kartolo',
                'address' => 'Surabaya',
                'phone_number' => '087678567456',
            ],
        ];

        $now = \Carbon\Carbon::now();
        foreach ($suppliers as $supplier) {
            DB::table('suppliers')->insert([
                'name' => $supplier['name'],
                'address' => $supplier['address'],
                'phone_number' => $supplier['phone_number'],
                'updated_at' => $now,
                'created_at' => $now,
            ]);
        }
    }
}
