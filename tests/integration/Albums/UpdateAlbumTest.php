<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Albums\UpdateAlbum;

class UpdateAlbumTest extends TestCase
{
    use DatabaseTransactions;
    
    /** @test */
    public function it_updates_album()
    {
        $album = factory(App\Album::class)->create(['name' => 'old Album']);

        $updateAlbum = new UpdateAlbum;

        $updateAlbum->update($album, ['name' => 'new Album']);

        $this->assertEquals('new Album', ($album->name));
    }
}
