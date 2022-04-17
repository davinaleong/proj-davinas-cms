<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory()->create([
        //     'name' => env('ROOT_NAME', 'John Doe'),
        //     'email' => env('ROOT_EMAIL', 'johndoe@example.com'),
        //     'password' => Hash::make(env('ROOT_PASSWORD', 'helloWorld'))
        // ]);
        \App\Models\Activity::factory(60)->create();
    }
}
