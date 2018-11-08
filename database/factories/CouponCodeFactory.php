<?php

use Faker\Generator as Faker;

$factory->define(App\Models\CouponCode::class, function (Faker $faker) {
    $type = $faker->randomElement(array_keys(App\Models\CouponCode::$typeMap));
    $value = $type === App\Models\CouponCode::TYPE_FIXED ? random_int(1, 200) : random_int(1, 50);

    if ($type === App\Models\CouponCode::TYPE_FIXED) {
        $minAmount = $value + 0.01;
    } else {
        if (random_int(0, 100) < 50) {
            $minAmount = 0;
        } else {
            $minAmount = random_int(100, 1000);
        }
    }

    return [
        'name' => join(' ', $faker->words),
        'code' => App\Models\CouponCode::findAvailableCode(),
        'type' => $type,
        'value' => $value,
        'total' => 100,
        'used' => 0,
        'min_amount' => $minAmount,
        'not_before' => null,
        'not_after' => null,
        'enabled' => true,
    ];
});
