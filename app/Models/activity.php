<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class activity extends Model
{
    use HasFactory;
    protected $table = 'activities';

    protected $fillable = [
        'title',
        'body',
        'slug',
        'image',
        'date',
        'time',
        'user_id',
    ];
}
