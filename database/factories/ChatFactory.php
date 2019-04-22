<?php

use Faker\Generator as Faker;

$factory->define(\App\Chat::class, function (Faker $faker) {
    return [
        'sender_id' => 1,
        'receiver_id' => 2,
    ];
});
