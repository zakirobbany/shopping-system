<?php

use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('customers')->truncate();
        Schema::enableForeignKeyConstraints();

        $customers = [
            [
                'name' => 'Ahmad Taufan',
                'address' => 'Pongkeng',
                'phone_number' => '089768467567',
            ],
            [
                'name' => 'Idris',
                'address' => 'Aengbaja Raja',
                'phone_number' => '087678567456',
            ],
        ];

        $now = \Carbon\Carbon::now();
        foreach ($customers as $customer) {
            DB::table('customers')->insert([
                'name' => $customer['name'],
                'address' => $customer['address'],
                'phone_number' => $customer['phone_number'],
                'updated_at' => $now,
                'created_at' => $now,
            ]);
        }
    }
}
