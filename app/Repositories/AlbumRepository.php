<?php

namespace App\Repositories;

use App\Album;
use App\Repositories\AlbumRepositoryInterface;

class AlbumRepository implements AlbumRepositoryInterface
{

    protected $album;

    public function __construct(Album $album)
    {
        $this->album = $album;
    }

    public function findAllCountPhotos()
    {
        return $this->album->leftjoin('photos', 'photos.album_id', '=', 'albums.id')
                    ->groupBy('albums.id')
                    ->get(['albums.id', 'albums.name', 'albums.slug',
                        'albums.created_at', \DB::raw('count(photos.id) as numberOfphotos')]);
    }

    public function findOneBy($att, $column)
    {
        return $this->album->where($att, $column)->first();
    }

    public function findOneByWithPhotos($att, $column)
    {
        return $this->album->where($att, $column)->with('photos')->first();
    }
}
