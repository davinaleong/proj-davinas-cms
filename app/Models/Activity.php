<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function getUserName()
    {
        return $this->user ? $this->user->name : '';
    }

    public function getCreatedAt()
    {
        $dbDatetimeFormat = "Y-m-d H:i:s";

        if (filled($this->created_at)) {
            $datetimeFormat = "d M Y H:i:s";

            $dt = Carbon::createFromFormat($dbDatetimeFormat, $this->created_at);
            return $dt->format($datetimeFormat);
        } else {
            return '';
        }
    }

    public function getUpdatedAt()
    {
        $dbDatetimeFormat = "Y-m-d H:i:s";

        if (filled($this->updated_at)) {
            $datetimeFormat = "d M Y H:i:s";

            $dt = Carbon::createFromFormat($dbDatetimeFormat, $this->updated_at);
            return $dt->format($datetimeFormat);
        } else {
            return '';
        }
    }
}
