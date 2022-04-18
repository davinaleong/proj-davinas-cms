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
        $user = \App\Models\User::factory()->create([
            'name' => env('ROOT_NAME', 'John Doe'),
            'email' => env('ROOT_EMAIL', 'johndoe@example.com'),
            'password' => Hash::make(env('ROOT_PASSWORD', 'helloWorld'))
        ]);
        // \App\Models\Activity::factory(60)->create();
        \App\Models\Setting::factory()->for($user)->create([
            'name' => 'Items per page',
            'key' => \App\Models\Setting::$KEY_LIST_PER_PAGE,
            'value' => env(\App\Models\Setting::$KEY_LIST_PER_PAGE, 50)
        ]);
        \App\Models\Setting::factory()->for($user)->create([
            'name' => 'DB Datetime Format',
            'key' => \App\Models\Setting::$KEY_DB_DT_FORMAT,
            'value' => env(\App\Models\Setting::$KEY_DB_DT_FORMAT, 'Y-m-d H:i:s')
        ]);
        \App\Models\Setting::factory()->for($user)->create([
            'name' => 'System Datetime Format',
            'key' => \App\Models\Setting::$KEY_SYSTEM_DT_FORMAT,
            'value' => env(\App\Models\Setting::$KEY_SYSTEM_DT_FORMAT, 'd M Y H:i:s')
        ]);
        \App\Models\Setting::factory()->for($user)->create([
            'name' => 'DB Date Format',
            'key' => \App\Models\Setting::$KEY_DB_DATE_FORMAT,
            'value' => env(\App\Models\Setting::$KEY_DB_DATE_FORMAT, 'Y-m-d')
        ]);
        \App\Models\Setting::factory()->for($user)->create([
            'name' => 'System Date Format',
            'key' => \App\Models\Setting::$KEY_SYSTEM_DATE_FORMAT,
            'value' => env(\App\Models\Setting::$KEY_SYSTEM_DATE_FORMAT, 'd M Y')
        ]);

        \App\Models\Post::factory(60)->for($user)->create();
    }
}
