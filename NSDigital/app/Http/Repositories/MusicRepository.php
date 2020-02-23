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

  public function destroyMusic($id) {
    $music = Music::find($id);

    if(!$music) 
      return 0;

    $music->delete();
    return 1;
  }
}
