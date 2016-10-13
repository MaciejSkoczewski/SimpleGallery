<?php

use Illuminate\Database\Seeder;

class AlbumsAndPhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Album::class, 30)->create()->each(function ($album) {
            factory(App\Photo::class, rand(1, 30))->create(['album_id' => $album->id]);
        });
    }
}
