<?php

namespace App\Http\Repositories;

use Illuminate\Http\Request;
use App\Model\Music;
use App\Http\Repositories\Types\BaseRepository;

class MusicRepository extends BaseRepository 
{
  protected $modelClass = Music::class;

  public function newMusic($data) {
    try {
      return Music::create($data);
    } catch(Exception $e) {
      return response()->json(['error' => $e->getMessage(), 401]);
    }
  }

  public function destroyMusic($id) {
    $music = Music::find($id);

    if(!$music) 
      return 0;

    $music->delete();
    return 1;
  }

  public function listMusics() {
    return Music::get();
  }
}
