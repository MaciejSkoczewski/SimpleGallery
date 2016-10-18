<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AlbumPhotosControllerTest extends TestCase
{

    use DatabaseTransactions;
    use WithoutMiddleware;

    /** @test */
    public function it_adds_photo()
    {
        $album = factory(App\Album::class)->create(['name' => 'test album']);

        $this->post('albums/1/photos', ['path' => 'http://www.obrazek.pl']);

        $this->seeInDatabase('photos', ['path' => 'http://www.obrazek.pl']);
    }

    /** @test */
    public function it_removes_photo()
    {
        $album = factory(App\Album::class)->create(['name' => "test album"]);
        $album->photos()->create(['path' => 'http://www.obrazek.pl/1']);
        $album->photos()->create(['path' => 'http://www.obrazek.pl/2']);

        $this->delete('albums/1/photos/1');

        $this->notSeeInDatabase('photos', ['path' => 'http://www.obrazek.pl/1']);

    }
}
