<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Repositories\ArtistRepository;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ArtistController extends Controller
{
    protected $artists;

    /**
     * Create a new repository instance.
     *
     * @param  ArtistRepository  $artists
     * @return void
     */
    public function __construct(ArtistRepository $artists)
    {
        $this->artists = $artists;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artistsList = $this->listArtists();
        return view('dashboard.artists.index')->with('artists', $artistsList);
    }
    
    public function viewArtistForm()
    {
        return view('dashboard.artists.artist-create');
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
                'name'=>'required',
            ]);
            
            $image = $request->file('artist_image');
            $extension = $image->getClientOriginalExtension();
            $validatedData["original_filename"] = $image->getClientOriginalName();
            $validatedData["filename"] = $image->getFilename().'.'.$extension;

            Storage::disk('public')->put(
                'artist/'.$image->getFilename().'.'.$extension, File::get($image)
            );
        
            $this->artists->newArtist($validatedData);

            return redirect('artists')->with(['success']);
            // return response()->json(['success', 200]);
            
        } catch(Exception $e) {
            return response()->json(['error' => $e->getMessage(), 401]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->artists->findArtist($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->artists->findArtist($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $image = $request->file('artist_image');
        $extension = $image->getClientOriginalExtension();
        $request->original_filename = $image->getClientOriginalName();
        $request->filename = $image->getFilename().'.'.$extension;

        Storage::disk('public')->put('artist/'.$image->getFilename().'.'.$extension, File::get($image));

        if ($this->artists->updateArtist($request, $id) == 1) {
            return redirect('artists')->with(['success']);
        } else {
            return response()->json(['error' => 'erro', 401]);
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
        if ($this->artists->destroyArtist($id) == 1) {
            return response()->json([ 'message' => 'Successful' ], 200);
        } else {
            return response()->json([ 'message' => 'Error' ], 404);
        }
    }

    public function listArtists() {
        return $this->artists->listArtists();
    }
}
