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
		
		// omdb url pattern
		// http://ia.media-imdb.com/images/M/MV5BMTc5OTk4MTM3M15BMl5BanBnXkFtZTgwODcxNjg3MDE@._V1_SX300.jpg
		$omdb_poster_url = Input::get('Poster');
		// retrieve filename
		$url_array = explode('/', $omdb_poster_url);
		$url_array_count = count($url_array);
		$filename = $url_array[$url_array_count - 1];
		// seperate name / extension
		$filename_array = explode('.', $filename);
		$filename_array_count = count($filename_array);
		$name = sha1($filename_array[0]);
		$ext = $filename_array[$filename_array_count - 1];
		// poster_url
		$path_img_dir = '/img/';
		$poster_url = $path_img_dir.$name.'.'.$ext;
		// save it
		$destinationPath = public_path().$poster_url;
        file_put_contents($destinationPath, file_get_contents($omdb_poster_url));



		Movie::create(array(
			'title'       => Input::get('Title'),
			'year'        => Input::get('Year'),
			'poster_url'  => $poster_url,
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
		// remove poster file
		$posters_filename = DB::table('movies')->select('poster_url')->where('id', $id)->get();
		foreach ($posters_filename as $p)
		{
			$poster_url = $p->poster_url;
		}
		/* debug
		return Response::json(array(
			'public_path'   => public_path(),
			'filename_set'  => $posters_filename,
			'filename'      => $poster_url,
			'poster_path' => public_path().$poster_url
		));
		*/
		File::delete(public_path().$poster_url);
		
		// remove movie entry from database
		Movie::destroy($id);

		return Response::json(array('success' => true));
	}


	/**
	 * Handle temporary movie poster
	 */
	public function moviePoster() {
		$omdb_poster_url = implode('', Input::all()); // why all() ?
		// retrieve filename
		$url_array = explode('/', $omdb_poster_url);
		$url_array_count = count($url_array);
		$filename = $url_array[$url_array_count - 1];
		// seperate name / extension
		$filename_array = explode('.', $filename);
		$filename_array_count = count($filename_array);
		$name = sha1($filename_array[0]);
		$ext = $filename_array[$filename_array_count - 1];
		// poster_url
		$path_img_dir = '/img/tmp/';
		$poster_url = $path_img_dir.$name.'.'.$ext;
		// save it
		$destinationPath = public_path().$poster_url;
        file_put_contents($destinationPath, file_get_contents($omdb_poster_url));

		return Response::json(array('poster' => $poster_url));
	}


}
