<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['name' => 'Admin', 'email' => 'admin@gmail.com', 'password' => bcrypt('12345678'), 'is_admin' => 1],
            ['name' => 'User1', 'email' => 'user@gmail.com', 'password' => bcrypt('12345678')],
            ['name' => 'User2', 'email' => 'head@gmail.com', 'password' => bcrypt('12345678')]
        ];


        foreach ($users as $key => $value) {
            User::create($value);
        }
    }
}
