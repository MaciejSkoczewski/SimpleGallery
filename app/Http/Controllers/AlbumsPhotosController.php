<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePhotoRequest;
use App\Photo;
use App\Album;

use App\Http\Requests;

class AlbumsPhotosController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id, StorePhotoRequest $request)
    {
        $album = Album::findOrFail($id);
        $album->photos()->create($request->all());
        
        \Session::flash('message', 'Dodano nowe zdjęcie do albumu');
        \Session::flash('alert-', 'success');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($album_id, $slug, $photo_id)
    {
        $photo = Photo::findOrFail($photo_id);
        return view('photos.show', ['photo' => $photo, 'slug' => $slug, 'album_id' => $album_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($album_id, $photo_id)
    {
        $photo = Photo::findOrFail($photo_id);
        $photo->delete();

        return redirect()->back();
    }
}
