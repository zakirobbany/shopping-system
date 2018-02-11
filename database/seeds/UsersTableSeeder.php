<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('users')->truncate();
        Schema::enableForeignKeyConstraints();

        $users = [
            [
                'name' => 'Ahmad Zaki Robbany M',
                'email' => 'admin@sinarindah.net',
                'password' => bcrypt(12345678),
                'role_id' => 1,
            ],
            [
                'name' => 'Badri',
                'email' => 'badri@sinarindah.net',
                'password' => bcrypt(12345678),
                'role_id' => 2,
            ]
        ];

        $now = \Carbon\Carbon::now();
        foreach ($users as $user) {
            DB::table('users')->insert([
                'role_id' => $user['role_id'],
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => $user['password'],
                'updated_at' => $now,
                'created_at' => $now,
            ]);
        }
    }
}
