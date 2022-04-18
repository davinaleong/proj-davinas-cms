<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Base
{
    use HasFactory;

    public static $KEY_LIST_PER_PAGE = 'LIST_PER_PAGE';
    public static $KEY_SEARCH_PER_PAGE = 'SEARCH_PER_PAGE';
    public static $KEY_DB_DT_FORMAT = 'DB_DT_FORMAT';
    public static $KEY_SYSTEM_DT_FORMAT = 'SYSTEM_DT_FORMAT';
    public static $KEY_DB_DATE_FORMAT = 'DB_DATE_FORMAT';
    public static $KEY_SYSTEM_DATE_FORMAT = 'SYSTEM_DATE_FORMAT';

    public static function getByKey(string $key)
    {
        return Setting::where('key', $key)
            ->first();
    }

    public static function getKeys()
    {
        return Setting::all()->pluck('key');
    }

    public static function getStaticKeys()
    {
        return [
            Setting::$KEY_LIST_PER_PAGE,
            Setting::$KEY_SEARCH_PER_PAGE,
            Setting::$KEY_DB_DT_FORMAT,
            Setting::$KEY_SYSTEM_DT_FORMAT,
            Setting::$KEY_DB_DATE_FORMAT,
            Setting::$KEY_SYSTEM_DATE_FORMAT,
        ];
    }

    public static function getListPerPage()
    {
        $value = env(Setting::$KEY_LIST_PER_PAGE);
        $setting = Setting::getByKey(Setting::$KEY_LIST_PER_PAGE);

        if (filled($setting)) {
            $value = $setting->value;
        }

        return $value;
    }

    public static function getSearchPerPage()
    {
        $value = env(Setting::$KEY_SEARCH_PER_PAGE);
        $setting = Setting::getByKey(Setting::$KEY_SEARCH_PER_PAGE);

        if (filled($setting)) {
            $value = $setting->value;
        }

        return $value;
    }

    public static function getDbDtFormat()
    {
        $value = env(Setting::$KEY_DB_DT_FORMAT);
        $setting = Setting::getByKey(Setting::$KEY_DB_DT_FORMAT);

        if (filled($setting)) {
            $value = $setting->value;
        }

        return $value;
    }

    public static function getSystemDtFormat()
    {
        $value = env(Setting::$KEY_SYSTEM_DT_FORMAT);
        $setting = Setting::getByKey(Setting::$KEY_DB_DT_FORMAT);

        if (filled($setting)) {
            $value = $setting->value;
        }

        return $value;
    }

    public static function getDbDateFormat()
    {
        $value = env(Setting::$KEY_DB_DATE_FORMAT);
        $setting = Setting::getByKey(Setting::$KEY_DB_DATE_FORMAT);

        if (filled($setting)) {
            $value = $setting->value;
        }

        return $value;
    }

    public static function getSystemDateFormat()
    {
        $value = env(Setting::$KEY_SYSTEM_DATE_FORMAT);
        $setting = Setting::getByKey(Setting::$KEY_DB_DATE_FORMAT);

        if (filled($setting)) {
            $value = $setting->value;
        }

        return $value;
    }
}
