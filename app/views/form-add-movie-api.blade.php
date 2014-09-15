@extends('layout.default')

@section('content')
<div class="container" ng-controller="omdbCtrl">
	<div class="page-header">
		<h1>Add a movie</h1>
	</div>

	<p class="text-center" ng-show="loading"><span class="fa fa-refresh fa-spin fa-2x"></span></p>

	<form ng-submit="submitMovieApi(movieData.title)" ng-hide="loading">
		<input type="hidden" name="title" value="%%movie.Title%%" />
		<input type="hidden" name="year" value="%%movie.Year%%" />
		<input type="hidden" name="poster_url" value="%%movie.Poster%%" />
		<input type="hidden" name="description" value="%%movie.Plot%%" />
		<input type="hidden" name="director" value="%%movie.Director%%" />
		<input type="hidden" name="stars" value="%%movie.Actors%%" />
		<input type="hidden" name="genre" value="%%movie.Genre%%" />

		<!-- title -->
		<div class="form-group">
			<input type="text" class="form-control" name="title" ng-model="movieData.title" placeholder="Title" />
		</div>

		<!-- submit -->
		<div class="form-group text-right">	
			<button type="submit" class="btn btn-primary btn-lg btn-block">Save</button>
		</div>
	</form>
	

	<div class="media" ng-hide="loading">
		<a class="pull-left" href="#">
			<img class="media-object" ng-src="%%movie.Poster%%" alt="%%movie.title%%" width="125" />
		</a>

		<div class="media-body">
			<h4 class="media-heading  movie__title">%%movie.Title%%</h4>
			<span class="movie__year">%%movie.Year%%</span>

			<div class="movie__description">
				%%movie.Plot%%
			</div>

			<p class="movie__director">
				%%movie.Director%%
			</p>

			<div class="movie__stars">
				%%movie.Actors%%
			</div>

			<p class="movie__genre">
				%%movie.Genre%%
			</p>
		</div>
	</div>
</div>
@stop