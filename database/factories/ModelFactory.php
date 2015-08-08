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
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Classified::class, function($faker) {

	$user = factory(App\User::class)->create();
	$category = App\Category::whereNotNull('parent_id')->orderBy(DB::raw('RAND()'))->take(1)->first();

	return [
		'user_id' => $user->id,
		'category_id' => $category->id,
		'title' => $faker->name,
		'description' => $faker->paragraph(5),
		'price' => $faker->numberBetween(0, 5000),
		'quantity' => $faker->numberBetween(0, 10),
		'is_approved' => 1,
		'visits' => $faker->numberBetween(0, 25000),
		'photo' => $faker->image(),
		'expires_at' => Carbon\Carbon::now()->addDays(30)
	];
});
