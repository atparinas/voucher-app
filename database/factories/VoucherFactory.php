<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Voucher;
use Faker\Generator as Faker;

$factory->define(Voucher::class, function (Faker $faker) {
    return [
        'code' => strtoupper(uniqid()),
        'status' => $faker->randomElement([Voucher::VALID, Voucher::USED]),
        'user_id' => factory(\App\User::class)
    ];
});
