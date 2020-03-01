<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Repositories\MusicRepository;

class MusicController extends Controller
{
    protected $musics;

    /**
     * Create a new repository instance.
     *
     * @param  MusicRepository  $musics
     * @return void
     */
    public function __construct(MusicRepository $musics)
    {
        $this->musics = $musics;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'music_file'=>'required',
            ]);
            
            $music_archive = $request->file('music_file');
            $music_name = $request->title_music;

            return response()->json(['success', 200]);
            
        } catch(Exception $e) {
            return response()->json(['error' => $e->getMessage(), 401]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Music  $music
     * @return \Illuminate\Http\Response
     */
    public function show(Music $music)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Music  $music
     * @return \Illuminate\Http\Response
     */
    public function edit(Music $music)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Music  $music
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Music $music)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Music  $music
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->musics->destroyMusic($id) == 1) {
            return response()->json([ 'message' => 'Successful' ], 200);
        } else {
            return response()->json([ 'message' => 'Error' ], 404);
        }
    }

    public function saveMusic($title, $archive, $album_id) {
        $data["title"] = $title;
        $data["album_id"] = $album_id;

        if ($archive) 
            $data["archive"] = $archive;

        
        try {
            $this->musics->newMusic($data);
            return response()->json(['success', 200]);
        } catch(Exception $e) {
            return response()->json(['error' => $e->getMessage(), 401]);
        }
    }
}
