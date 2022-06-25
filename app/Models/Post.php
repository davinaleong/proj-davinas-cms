<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Carbon\Carbon;

class Post extends Base
{
    use HasFactory;
    use SoftDeletes;

    protected $hidden = [
        'id', 'user_id', 'created_at', 'updated_at', 'deleted_at'
    ];

    public static function generateSlug($name)
    {
        if (empty($name)) {
            return '';
        }
        return Str::slug($name);
    }

    public static function generateSummary($text)
    {
        if (empty($text)) {
            return '';
        }

        return Str::words(strip_tags(Str::markdown($text)), 50, '...');
    }

    public function getPublishedAt()
    {
        $dbDatetimeFormat = Setting::getDbDateFormat();

        if (filled($this->published_at)) {
            $datetimeFormat = Setting::getSystemDateFormat();

            $dt = Carbon::createFromFormat($dbDatetimeFormat, $this->published_at);
            return $dt->format($datetimeFormat);
        } else {
            return '';
        }
    }
}
