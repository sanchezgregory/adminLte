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
        factory(\App\User::class)->create([
            'firstname' => 'Pedro',
            'lastname' => 'Perez',
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456'),
            'active' => true,
            'role' => 'admin',
        ]);
        factory(\App\User::class,5)->create();
    }
}
