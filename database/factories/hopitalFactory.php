<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\User;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) use ($factory) {
    return [
        'title' => $faker->title,
        'content' => $faker->text(300),
        'image'=>$faker->image(),
    ];
});
