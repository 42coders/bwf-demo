<?php

namespace Database\Seeders;

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
        \App\User::factory()->create(
            [
                'name' => 'Administrator',
                'email' => 'admin@bwf',
                'password' => bcrypt('secret')
            ]
        );

        \App\User::factory()->create(
            [
                'name' => 'User',
                'email' => 'user@bwf',
                'password' => bcrypt('secret')
            ]
        );
    }
}
