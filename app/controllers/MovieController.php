<?php

class MovieController extends \BaseController {

	/**
	 * Laravel sends content to the frontend as JSON
	 *
	 * @return Response
	 */
	public function index()
	{
		return Response::json(Movie::get());
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		// handled by AngularJS
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
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


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		// handled by AngularJS
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
