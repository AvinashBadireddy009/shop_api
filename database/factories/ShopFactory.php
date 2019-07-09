<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;
use App\User;
use App\Shop;

$factory->define(Shop::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'address' => $faker->address,
        'phonenumber' => $faker->randomNumber(7, false),
        'user_id' => function () use ($faker)
        {
            if(User::count())
                return $faker->randomElement(User::pluck('id')->toArray());
            else 
                return factory(User::class)->create()->id;
        }
    ];
});
