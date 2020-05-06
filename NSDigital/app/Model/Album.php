<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table = 'albuns';

    protected $fillable = [
        'title', 'artist_id', 'filename', 'original_filename'
    ];

    public function artist()
    {
        return $this->belongsTo('App\Model\Artist');
    }

    public function musics()
    {
        return $this->hasMany('App\Model\Music');
    }
}
