<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Folder extends Base
{
    use HasFactory;

    public function posts()
    {
        return $this->hasMany('\App\Models\Post');
    }
}
