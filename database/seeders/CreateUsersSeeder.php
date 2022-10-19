<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'MomoAdmin',
                'email' => 'momo@gmail.com',
                'is_admin' => '1',
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'Kale',
                'email' => 'kale@gmail.com',
                'is_admin' => '0',
                'password' => bcrypt('12345678'),
            ],
        ];
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
