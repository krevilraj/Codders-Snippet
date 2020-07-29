<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Code;
use Faker\Generator as Faker;

$factory->define(Code::class, function (Faker $faker) {
    return [
      'group' => $faker->name,
      'title' => $faker->name,
      'template' => $faker->name,
      'category_id' => 1,
      'user_id' => 1,
    ];
});
