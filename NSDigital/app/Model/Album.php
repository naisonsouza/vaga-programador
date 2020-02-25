<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table = 'albuns';

    protected $fillable = [
        'title_album'
    ];
}
