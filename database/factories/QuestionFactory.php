<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Question;
use Faker\Generator as Faker;

$factory->define(Question::class, function (Faker $faker) {

    return [
        'lesson_id' => $faker->randomDigitNotNull,
        'Question' => $faker->word,
        'option1' => $faker->text,
        'option2' => $faker->text,
        'option3' => $faker->text,
        'option4' => $faker->text,
        'answer' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
