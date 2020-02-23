<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Repositories\AlbumRepository;

class AlbumController extends Controller
{
    protected $albuns;

    /**
     * Create a new repository instance.
     *
     * @param  AlbumRepository  $albuns
     * @return void
     */
    public function __construct(AlbumRepository $albuns)
    {
        $this->albuns = $albuns;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.albuns.index');
    }

    public function viewAlbum()
    {
        return view('dashboard.albuns.album-detail');
    }

    public function viewAlbumForm()
    {
        return view('dashboard.albuns.album-create');
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
            dd($request);

            $validatedData = $request->validate([
                'title_album'=>'required',
            ]);
            
            $image = $request->file('image-album');
            $extension = $image->getClientOriginalExtension();
            $validatedData->original_filename = $image->getClientOriginalName();
            $validatedData->filename = $image->getFilename().'.'.$extension;
        
            Storage::disk('storage')->put(
                $image->getFilename().'.'.$extension, File::get($image)
            );

            $album_id = $this->albuns->newAlbum($validatedData)->id;
            
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
     * @param  \App\Model\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if ($this->albuns->updateAlbum($request) == 1) {
            return response()->json(['success', 200]);
        } else {
            return response()->json(['error' => $e->getMessage(), 401]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->albuns->destroyAlbum($id) == 1) {
            return response()->json([ 'message' => 'Successful' ], 200);
        } else {
            return response()->json([ 'message' => 'Error' ], 404);
        }
    }
}
