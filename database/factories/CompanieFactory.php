<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Companie;
use Faker\Generator as Faker;

$factory->define(Companie::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'email' => $faker->word,
        'logo' => $faker->word,
        'website' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
