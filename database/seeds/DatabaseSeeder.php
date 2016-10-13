<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    protected $toTruncate = ['photos', 'albums'];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        foreach ($this->toTruncate as $table) {

            DB::table($table)->truncate();
        
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        if (!(DB::table('albums')->first())) {

            $this->call(AlbumsAndPhotosTableSeeder::class);
        }

        Model::reguard();
    }
}
