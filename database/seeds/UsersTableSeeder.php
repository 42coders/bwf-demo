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
        factory(App\User::class, 1)->create(
            [
                'name' => 'Administrator',
                'email' => 'admin@bwf',
                'password' => bcrypt('secret')
            ]
        );

        factory(App\User::class, 1)->create(
            [
                'name' => 'User',
                'email' => 'user@bwf',
                'password' => bcrypt('secret')
            ]
        );
    }
}
