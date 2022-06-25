<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::truncate();
        Setting::factory()->createMany([
            [
                'user_id' => 1,
                'name' => 'Items per page',
                'key' => \App\Models\Setting::$KEY_LIST_PER_PAGE,
                'value' => env(\App\Models\Setting::$KEY_LIST_PER_PAGE, 50)
            ],
            [
                'user_id' => 1,
                'name' => 'Search items per page',
                'key' => \App\Models\Setting::$KEY_SEARCH_PER_PAGE,
                'value' => env(\App\Models\Setting::$KEY_SEARCH_PER_PAGE, 50)
            ],
            [
                'user_id' => 1,
                'name' => 'DB Datetime Format',
                'key' => \App\Models\Setting::$KEY_DB_DT_FORMAT,
                'value' => env(\App\Models\Setting::$KEY_DB_DT_FORMAT, 'Y-m-d H:i:s')
            ],
            [
                'user_id' => 1,
                'name' => 'System Datetime Format',
                'key' => \App\Models\Setting::$KEY_SYSTEM_DT_FORMAT,
                'value' => env(\App\Models\Setting::$KEY_SYSTEM_DT_FORMAT, 'd M Y H:i:s')
            ],
            [
                'user_id' => 1,
                'name' => 'DB Date Format',
                'key' => \App\Models\Setting::$KEY_DB_DATE_FORMAT,
                'value' => env(\App\Models\Setting::$KEY_DB_DATE_FORMAT, 'Y-m-d')
            ],
            [
                'user_id' => 1,
                'name' => 'System Date Format',
                'key' => \App\Models\Setting::$KEY_SYSTEM_DATE_FORMAT,
                'value' => env(\App\Models\Setting::$KEY_SYSTEM_DATE_FORMAT, 'd M Y')
            ],
            [
                'user_id' => 1,
                'name' => 'Year Format',
                'key' => \App\Models\Setting::$KEY_YEAR_FORMAT,
                'value' => env(\App\Models\Setting::$KEY_YEAR_FORMAT, 'Y')
            ]
        ]);
    }
}
