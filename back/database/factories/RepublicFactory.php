<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Republic;
use App\User;
use Faker\Generator as Faker;

$factory->define(Republic::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'zipCode' => $faker->postcode,
        'city' => $faker->city,
        'street' => $faker->streetName,
        'number' => $faker->buildingNumber,
        'totalBathroom' => $faker->randomDigit,
        'haveBackyard' => $faker->boolean ,
        'acceptPets' => $faker->boolean ,
        'user_id' => factory('App\User')->create()->id
    ];
});
