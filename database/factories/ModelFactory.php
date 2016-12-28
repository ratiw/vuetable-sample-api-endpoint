<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'nickname' => $faker->word,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
        'birthdate' => $faker->dateTimeBetween('-30 years', 'now'),
        'gender' => $faker->randomElement(['M', 'F']),
        'salary' => $faker->numberBetween(9000, 50000),
        'group_id' => $faker->randomElement([1, 2, 3, 4, 5])
    ];
});

$factory->define(App\Address::class, function (Faker\Generator $faker) {
    return [
        'line1' => $faker->address,
        'line2' => $faker->country,
        'zipcode' => $faker->postcode,
        'mobile' => $faker->phoneNumber,
        'fax' =>  $faker->phoneNumber
    ];
});