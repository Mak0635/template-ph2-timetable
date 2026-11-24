<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimetableEntry extends Model
{
    // create() でまとめて保存してよい列
    protected $fillable = [
        'day',
        'period',
        'title',
        'room',
    ];
}
