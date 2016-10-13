<?php

namespace app\Albums;

use App\Album;
use App\Http\Requests\StoreAlbumRequest;

/**
 * 
 */
class UpdateAlbum
{
    public function update(Album $album, StoreAlbumRequest $request)
    {
        $album->slug = null;

        $album->fill($request->all())->save();
    }
}
