<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Contact;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Contact::class, function (Faker $faker) use ($factory) {
    return [
        'user_id' =>$factory->create(App\User::class)->id,
        'title' => $faker->title,
        'message' => $faker->text(300),
    ];
});
