<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;
use App\Product;
use App\Shop;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'description' => $faker->sentences(3, true),
        'price' => $faker->randomDigit,
        'inventory' => $faker->randomDigitNotNull,
        'shop_id' => function () use ($faker) {
            if(Shop::count())
                return $faker->randomElement(Shop::pluck('id')->toArray());
            else return factory(Shop::class)->create()->id;
        }
    ];
});
