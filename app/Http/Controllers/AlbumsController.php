<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\StoreAlbumRequest;
use App\Repositories\AlbumRepositoryInterface;
use App\Albums\UpdateAlbum;

class AlbumsController extends Controller
{
    protected $album;

    public function __construct(AlbumRepositoryInterface $album)
    {
        $this->album = $album;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = $this->album->findAllCountPhotos();

        return view('albums.index', ['albums' => $albums]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('albums.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAlbumRequest $request)
    {
        \App\Album::create($request->all());

        \Session::flash('message', 'Nowy album został dodany pomyślnie');
        \Session::flash('alert-', 'success');

        return redirect()->route('albums.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $slug)
    {
        $album = $this->album->findOneByWithPhotos('id', $id);
        
        if (!$album) {
            abort(404);
        }

        return view('albums.show', ['album' => $album]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $album = $this->album->findOneBy('id', $id);
        
        if (!$album) {
            abort(404);
        }

        return view('albums.edit', ['album' => $album]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAlbumRequest $request, $id, UpdateAlbum $updateAlbum)
    {
        $album = $this->album->findOneBy('id', $id);
        
        if (!$album) {
            abort(404);
        }

        $updateAlbum->update($album, $request->all());

        return redirect()->route('albums.show', ['id' => $album->id, 'slug' => $album->slug])
                        ->with('message', 'Album został pomyślnie edytowany')
                        ->with('alert-', 'info');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $album = $this->album->findOneBy('id', $id);
        
        if (!$album) {
            abort(404);
        }

        $album->delete();

        return redirect()->route('albums.index')->with('message', 'Album został pomyślnie skasowany')
                            ->with('alert-', 'info');
    }
}
