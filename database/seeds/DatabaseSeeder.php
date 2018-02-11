<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CourierTypesTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(CouriersTableSeeder::class);
        $this->call(EmployeesTableSeeder::class);
        $this->call(CompanyProfileTableSeeder::class);
        $this->call(CustomersTableSeeder::class);
        $this->call(SuppliersTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
