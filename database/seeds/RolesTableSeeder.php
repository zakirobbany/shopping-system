<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('roles')->truncate();
        Schema::enableForeignKeyConstraints();

        $roles = [
            [
                'name' => 'admin',
            ],
            [
                'name' => 'staff',
            ],
        ];

        $now = \Carbon\Carbon::now();
        foreach ($roles as $role) {
            DB::table('roles')->insert([
                'name' => $role['name'],
                'updated_at' => $now,
                'created_at' => $now,
            ]);
        }
    }
}
