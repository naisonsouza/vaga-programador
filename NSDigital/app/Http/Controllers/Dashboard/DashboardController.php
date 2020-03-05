<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Dashboard\ArtistController;
use App\Http\Controllers\Dashboard\AlbumController;
use App\Http\Controllers\Dashboard\MusicController;

class DashboardController extends Controller
{
    protected $artists;
    protected $albuns;
    protected $musics;

    /**
     * Create a new repository instance.
     *
     * @param  ArtistController  $artists
     * @param  AlbumController  $albuns
     * @param  MusicController  $musics
     * @return void
     */
    public function __construct(ArtistController $artists, AlbumController $albuns, MusicController $musics)
    {
        $this->artists = $artists;
        $this->albuns = $albuns;
        $this->musics = $musics;
    }

    public function index() {
        return view('dashboard.index')->with([
            'artistsCount' => $this->artists->listArtistsCount(),
            'albunsCount' => $this->albuns->listAlbunsCount(),
            'musicsCount' => $this->musics->listMusicsCount(),
        ]);
    }
}
