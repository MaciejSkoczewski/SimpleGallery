<?php

namespace App\Repositories;

interface AlbumRepositoryInterface
{
    public function findAllCountPhotos();

    public function findOneBy($att, $column);

    public function findOneByWithPhotos($att, $column);
}
