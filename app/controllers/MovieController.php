<?php

class MovieController extends \BaseController {

	/**
	 * Laravel sends content to the frontend as JSON
	 *
	 * @return Response
	 */
	public function index()
	{
		return Response::json(Movie::orderBy('id', 'desc')->get());
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
		/*
		$movie              = new Movie();
		
		$movie->title       = Input::get('movie_title'); 
		$movie->year        = Input::get('movie_year');
		$movie->description = Input::get('movie_description');
		$movie->director    = Input::get('movie_director');
		//$movie->stars       = Input::get('movie_stars');
		$movie->genre       = Input::get('movie_genre');
		
		// Poster
		$img                = Input::file('movie_poster');		
		$filename           = $img->getClientOriginalName();		
		$movie->poster_url  = $filename;
		*/

		Movie::create(array(
			'title'       => Input::get('Title'),
			'year'        => Input::get('Year'),
			'poster_url'  => Input::get('Poster'),
			'description' => Input::get('Plot'),
			'director'    => Input::get('Director'),
			'stars'       => Input::get('Actors'),
			'genre'       => Input::get('Genre'),
		));

		return Response::json(array('success' => true));
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return Response::json(Movie::find($id));
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
		Movie::destroy($id);

		return Response::json(array('success' => true));
	}


}
