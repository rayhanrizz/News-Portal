<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\news;
use Faker\Generator as Faker;

$factory->define(news::class, function (Faker $faker) {
	$faker->addProvider(new \Mmo\Faker\PicsumProvider($faker));
    return [
        'judul_news' => $faker->word,
        'potongan_news' => $faker->sentence,
        'isi_news' => $faker->paragraph,
        'tgl_news' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'gambar' => $faker->picsum('public/image',400,400, false)
    ];
});
