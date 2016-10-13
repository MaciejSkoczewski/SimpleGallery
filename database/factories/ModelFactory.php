<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Album::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->sentence(mt_rand(1, 4)),
    ];
});

$factory->define(App\Photo::class, function (Faker\Generator $faker) {
    return [
        'path' => $faker->imageUrl($width = 640, $height = 480),
        //'album_id' => factory(App\Album::class)->create()->id,
    ];
});
