<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravelista\Comments\Commentable;

class gWork extends Model
{
    use Commentable;

    protected $fillable = ['title','body','user_id'];
    protected $casts = [
        'user_id' => 'array', // Will convarted to (Bool)

    ];
}
