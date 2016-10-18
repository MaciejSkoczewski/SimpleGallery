<?php

namespace app\Albums;

use App\Album;

/**
 * 
 */
class UpdateAlbum
{
    public function update(Album $album, array $data)
    {
        $album->slug = null;

        $album->fill($data)->save();
    }
}
