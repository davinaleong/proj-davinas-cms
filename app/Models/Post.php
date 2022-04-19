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

    public static function generateSlug($name)
    {
        return Str::slug($name);
    }

    public static function generateSummary($text)
    {
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
