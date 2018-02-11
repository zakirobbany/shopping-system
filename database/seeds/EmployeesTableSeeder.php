<?php

use Illuminate\Database\Seeder;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->truncate();

        $employees = [
            [
                'name' => 'Badri',
                'address' => 'Aengbaja Kenek',
                'phone_number' => '087678435564',
            ],
            [
                'name' => 'No',
                'address' => 'Saronggi',
                'phone_number' => '088678456234',
            ]
        ];

        $now = \Carbon\Carbon::now();
        foreach ($employees as $employee) {
            DB::table('employees')->insert([
                'name' => $employee['name'],
                'address' => $employee['address'],
                'phone_number' => $employee['phone_number'],
                'updated_at' => $now,
                'created_at' => $now,
            ]);
        }
    }
}
