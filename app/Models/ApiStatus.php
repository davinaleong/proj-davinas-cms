<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApiStatus extends Model
{
    // Statuses
    public static $STATUS_SUCCESS = 'SUCCESS';
    public static $STATUS_FAILED = 'FAILED';

    // Messages
    public static $MESSAGE_POSTS_FEATURED = 'Featured posts fixed.';

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
            self::$MESSAGE_POSTS_FEATURED,
        ];
    }
}
