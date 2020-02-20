<?php

namespace App\Http\Repositories;

use Illuminate\Http\Request;
use App\Model\Music;
use App\Http\Repositories\Types\BaseRepository;

class MusicRepository extends BaseRepository 
{
  protected $modelClass = Music::class;

  public function newMusic($data) {
    return Music::create($data);
  }
}
