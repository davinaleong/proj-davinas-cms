<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Post extends Base
{
    use HasFactory;
    use SoftDeletes;

    public static function generateSlug($name)
    {
        return Str::slug($name);
    }

    public static function generateSummary($text)
    {
        return Str::words(strip_tags($text), 200, '...');
    }
}
