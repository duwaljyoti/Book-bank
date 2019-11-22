<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Book::class, function (Faker $faker) use ($factory) {
    return [
        'name'=>$faker->name,
        'author'=>$faker->name,
        'publication'=>$faker->sentence,
        'user_id'=>$factory->create(App\User::class)->id,
    ];
});
