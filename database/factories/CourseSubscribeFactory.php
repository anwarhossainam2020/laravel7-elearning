<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\CourseSubscribe;
use Faker\Generator as Faker;

$factory->define(CourseSubscribe::class, function (Faker $faker) {

    return [
        'course_id' => $faker->randomDigitNotNull,
        'user_id' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
