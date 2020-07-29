<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
       'title'=>$faker->sentence,
        'body'=>$faker->paragraph,
        'category_id'=>rand(1,5),
        'user_id'=>rand(1,2)
    ];
});
