<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AlbumControllerTest extends TestCase
{

    use DatabaseTransactions;
    use WithoutMiddleware;
    
    /** @test */
    public function it_shows_list_of_all_albums()
    {
        $albums = factory(App\Album::class, 10)->create()->each(function ($album) {
            factory(App\Photo::class, 5)->create(['album_id' => $album->id]);
        });

        $this->get(route('albums.index'))->assertResponseOk();

        foreach ($albums as $album) {
            $this->see($album->name);
        }
    }

    /** @test */
    public function it_adds_album()
    {
        $this->post(route('albums.store', ['name' => 'new test album']));

        $this->seeInDatabase('albums', ['name' => 'new test album', 'slug' => 'new-test-album']);
    }

    /** @test */
    public function it_removes_album()
    {
        $album = factory(App\Album::class)->create(['name' => "test album"]);

        $this->delete(route('albums.destroy', ['1' => 1]));

        $this->notSeeInDatabase('albums', ['name' => 'test album', 'slug' => 'test-album']);

    }

    /** @test */
    public function it_updates_album()
    {
        $album = factory(App\Album::class)->create(['name' => 'test album']);

        $this->put('albums/1', ['name' => 'test album 2']);

        $this->notSeeInDatabase('albums', ['name' => 'test album', 'slug' => 'test-album']);

        $this->seeInDatabase('albums', ['name' => 'test album 2', 'slug' => 'test-album-2']);
    }
}
