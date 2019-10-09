<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\PostImage::class, function (Faker $faker) {
    return [
        'image' => $faker->imageUrl(640, 480)
    ];
});
