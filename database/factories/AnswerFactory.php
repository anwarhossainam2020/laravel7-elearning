<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Answer;
use Faker\Generator as Faker;

$factory->define(Answer::class, function (Faker $faker) {

    return [
        'user_id' => $faker->randomDigitNotNull,
        'lesson_id' => $faker->randomDigitNotNull,
        'question_id' => $faker->randomDigitNotNull,
        'answer' => $faker->word,
        'answer_at' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
