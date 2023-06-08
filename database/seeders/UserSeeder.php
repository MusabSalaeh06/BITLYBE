<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Mus-ab',
                'email' => 'Musab@gmail.com',
                'password' => Hash::make('0000000000'),
            ]
            ];
            User::insert($users);
    }
}
