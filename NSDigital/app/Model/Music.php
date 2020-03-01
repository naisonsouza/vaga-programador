<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    protected $fillable = [ 'title', 'archive', 'album_id' ];

    public function album()
    {
        return $this->belongsTo('App\Model\Album');
    }
}
