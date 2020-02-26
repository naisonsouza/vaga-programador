<?php

namespace App\Http\Repositories;

use Illuminate\Http\Request;
use App\Model\Album;
use App\Http\Repositories\Types\BaseRepository;

class AlbumRepository extends BaseRepository 
{
  protected $modelClass = Album::class;

  public function listAlbuns() {
    return Album::with('artist')->get();
  }

  public function newAlbum($data) {
    return Album::create($data);
  }

  public function updateAlbum(Request $request) {
    $album = Album::find($request->id);

    if(!$album) 
      return 0;

    $album->fill($request->all());
    $album->save();

    return 1;
  }

  public function destroyAlbum($id) {
    $album = Album::find($id);

    if(!$album) 
      return 0;

    $album->delete();
    return 1;
  }
}
