<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class MoviesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 20) as $index)
		{
			Movie::create([
				'title'       => $faker->sentence(),
				'year'        => $faker->year($max = 'now'),
				'poster_url'  => $faker->image($dir = 'public/img', $width = 125, $height = 200),
				'description' => $faker->paragraph(2),
				'director'    => $faker->name(),
				'stars'       => $faker->name().', '.$faker->name(),
				'note'        => $faker->numberBetween($min = 0, $max = 5),
				'genre'       => $faker->sentence(1),
				'watched'     => $faker->boolean($chanceOfGettingTrue = 30),
			]);
		}
	}

}