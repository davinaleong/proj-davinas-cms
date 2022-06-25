<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApiStatus extends Model
{
    // Statuses
    public static $STATUS_SUCCESS = 'SUCCESS';
    public static $STATUS_FAILED = 'FAILED';

    // Messages
    public static $MESSAGE_CSRF_SUCCESS = 'Showing CSRF token.';
    public static $MESSAGE_GET_DATA_SUCCESS = 'GET data SUCCESS.';
    public static $MESSAGE_GET_DATA_FAILED = 'GET data FAILED.';
    public static $MESSAGE_POSTS_FEATURED_SUCCESS = 'Featured posts fixed.';
    public static $MESSAGE_POSTS_FEATURED_FAILED = 'Featured posts fix FAILED.';

    public static function getStatuses()
    {
        return [
            self::$STATUS_SUCCESS,
            self::$STATUS_FAILED,
        ];
    }

    public static function getMessages()
    {
        return [
            self::$MESSAGE_CSRF_SUCCESS,
            self::$MESSAGE_GET_DATA_SUCCESS,
            self::$MESSAGE_GET_DATA_FAILED,
            self::$MESSAGE_POSTS_FEATURED_SUCCESS,
            self::$MESSAGE_POSTS_FEATURED_FAILED,
        ];
    }
}
