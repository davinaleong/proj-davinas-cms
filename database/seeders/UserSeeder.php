<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => env('ROOT_NAME', 'admin'),
            'email' => env('ROOT_EMAIL', 'admin@example.com'),
            'password' => Hash::make(env('ROOT_PASSWORD', 'helloWorld')),
        ]);
    }
}
