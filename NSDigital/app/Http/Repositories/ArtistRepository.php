<?php

namespace App\Http\Repositories;

use Illuminate\Http\Request;
use App\Model\Artist;
use App\Http\Repositories\Types\BaseRepository;

class ArtistRepository extends BaseRepository 
{
  protected $modelClass = Artist::class;

  public function listArtists() {
    return Artist::all();
  }

  public function newArtist($data) {
    return Artist::create($data);
  }

  public function updateArtist(Request $request, $id) {
    $artist = Artist::find($id);

    if(!$artist)
      return 0;

    $artist->name = $request->name;
    $artist->filename = $request->filename;
    $artist->original_filename = $request->original_filename;
    $artist->save();

    return 1;
  }

  public function destroyArtist($id) {
    $artist = Artist::find($id);

    if(!$artist) 
      return 0;

    $artist->delete();
    return 1;
  }

  public function findArtist($id) {
    return Artist::find($id);
  }
}
