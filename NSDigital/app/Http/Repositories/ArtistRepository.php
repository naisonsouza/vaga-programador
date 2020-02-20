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

  public function updateArtist(Request $request) {
    $artist = Artist::find($request->id);

    if(!$artist) 
      return 0;

    $artist->fill($request->all());
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
}
