<?php

namespace App\Http\Repositories;

use Illuminate\Http\Request;
use App\Model\Artist;
use App\Http\Repositories\Types\BaseRepository;

class ArtistRepository extends BaseRepository 
{
  protected $modelClass = Artist::class;

  public function newArtist($data) {
    return Artist::create($data);
  }
}
