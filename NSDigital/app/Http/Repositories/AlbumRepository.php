<?php

namespace App\Http\Repositories;

use Illuminate\Http\Request;
use App\Model\Album;
use App\Http\Repositories\Types\BaseRepository;

class AlbumRepository extends BaseRepository 
{
  protected $modelClass = Album::class;

  public function listAlbuns() {
    return Album::with('artist')->orderBy('id', 'DESC')->get();
  }

  public function newAlbum($data) {
    return Album::create($data);
  }

  public function updateAlbum(Request $request, $id) {
    $album = Album::find($id);
    
    if(!$album) 
      return 0;

    $album->title = $request->title;
    $album->filename = $request->filename;
    $album->original_filename = $request->original_filename;

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

  public function findAlbum($id) {
    return Album::with('musics')->find($id);
  }
}
