<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{

    public function run()
    {
        foreach (range(1, 50) as $i) {
            User::create([
                'name' => "UserO $i",
                'email' => "userO$i@example.com",
                'password' => Hash::make('password'),
                'created_at' => now()->subMonths(rand(0, 11)),
            ]);
        }
    }

}
