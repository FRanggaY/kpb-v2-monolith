<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Sam Fisher',
            'username' => 'samfisher',
            'email' => 'samfisher@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => 'admin',
            'status' => 1,
            'gender' => 'M'
        ]);

    }
}
