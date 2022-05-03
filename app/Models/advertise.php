<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class advertise extends Model
{
    use HasFactory;
    protected $table = 'advertises';

    protected $fillable = [
        'title',
        'slug',
        'image',
        'link',
        'status',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
