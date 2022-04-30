<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Base extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    protected $hidden = [
        'id', 'user_id', 'created_at', 'updated_at', 'deleted_at'
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
        $dbDatetimeFormat = Setting::getDbDtFormat();

        if (filled($this->created_at)) {
            $datetimeFormat = Setting::getSystemDtFormat();

            $dt = Carbon::createFromFormat($dbDatetimeFormat, $this->created_at);
            return $dt->format($datetimeFormat);
        } else {
            return '';
        }
    }

    public function getUpdatedAt()
    {
        $dbDatetimeFormat = Setting::getDbDtFormat();

        if (filled($this->updated_at)) {
            $datetimeFormat = Setting::getSystemDtFormat();

            $dt = Carbon::createFromFormat($dbDatetimeFormat, $this->updated_at);
            return $dt->format($datetimeFormat);
        } else {
            return '';
        }
    }
}
