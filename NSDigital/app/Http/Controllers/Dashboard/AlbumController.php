<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Repositories\AlbumRepository;
use App\Http\Controllers\Dashboard\MusicController;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

class AlbumController extends Controller
{
    protected $albuns;
    protected $musics;

    /**
     * Create a new repository instance.
     *
     * @param  AlbumRepository  $albuns
     * @param  MusicController  $musics
     * @return void
     */
    public function __construct(AlbumRepository $albuns, MusicController $musics)
    {
        $this->albuns = $albuns;
        $this->musics = $musics;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albunsList = $this->listAlbuns();
        //dd($albunsList);
        return view('dashboard.albuns.index')->with('albuns', $albunsList);
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
            $validatedData = $request->validate([ 
                'title'=>'required',
                'artist_id'=>'required'
            ]);            
            $image = $request->file('album_image');
            $extension = $image->getClientOriginalExtension();
            $validatedData["original_filename"] = $image->getClientOriginalName();
            $validatedData["filename"] = $image->getFilename().'.'.$extension;
        
            Storage::disk('public')->put('album/'.$image->getFilename().'.'.$extension, File::get($image));

            $album_id = $this->albuns->newAlbum($validatedData)->id;

            $this->saveMusics($request, $album_id);

            Cache::put('message', 'Sucesso ao cadastrar o Álbum!',  Carbon::now()->addSeconds(5));

            return redirect('albuns')->with(['success']);            
        } catch(Exception $e) {
            Cache::put('error', 'Erro: '+$e, Carbon::now()->addSeconds(5));

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
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->albuns->findAlbum($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $image = $request->file('album_image');
        $extension = $image->getClientOriginalExtension();
        $request->original_filename = $image->getClientOriginalName();
        $request->filename = $image->getFilename().'.'.$extension;

        Storage::disk('public')->put('album/'.$image->getFilename().'.'.$extension, File::get($image));

        if ($this->albuns->updateAlbum($request, $id) == 1) {
            Cache::put('message', 'Sucesso ao editar o Álbum!',  Carbon::now()->addSeconds(5));
            return redirect('albuns')->with(['success']);
        } else {
            Cache::put('error', 'Erro: '+$e, Carbon::now()->addSeconds(5));

            return response()->json(['error', 401]);
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

    public function listAlbuns() {
        return $this->albuns->listAlbuns();
    }

    public function saveMusics(Request $request, $album_id) {
        $musics = explode('-,', $request->musics_title[0]);
        $cont = 0;
        foreach($request->file() as $file) {
            if ($file->getMimeType() == "audio/mpeg") {
                $content = base64_encode(file_get_contents($file));
                $this->musics->saveMusic($musics[$cont], $content, $album_id);
                $cont++;
            }
        }
    }

    public function saveMusic(Request $request) {
        $content = null;//base64_encode(file_get_contents($request->file(0)));
        $this->musics->saveMusic($request->title, $content, $request->id);

    }
}
