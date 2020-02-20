<?php

namespace App\Http\Repositories;

use Illuminate\Http\Request;
use App\Model\Album;
use App\Http\Repositories\Types\BaseRepository;

class AlbumRepository extends BaseRepository 
{
  protected $modelClass = Album::class;

  public function newAlbum($data) {
    return Album::create($data);
  }
}
