<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Repositories\AlbumRepository;
use App\Album;

class AlbumRepositoryTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_fetches_all_albums_with_a_number_of_their_photos()
    {
        factory(App\Album::class, 3)->create()->each(function ($album) {
            factory(App\Photo::class, 10)->create(['album_id' => $album->id]);
        });

        $albumRepository = new AlbumRepository(new Album);
        $allAlbums = $albumRepository->findAllCountPhotos();

        $this->assertCount(3, $allAlbums);
        $this->assertEquals(10, $allAlbums->first()->numberOfphotos);
    }

    /** @test */
    public function it_fetches_one_specific_album()
    {
        factory(App\Album::class, 5)->create();
        $specificAlbum = factory(App\Album::class)->create(['id' => 77]);

        $albumRepository = new AlbumRepository(new Album);
        $album = $albumRepository->findOneBy('id', 77);

        $this->assertEquals($specificAlbum->id, $album->id);
    }
}
