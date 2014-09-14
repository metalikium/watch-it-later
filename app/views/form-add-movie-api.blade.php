@extends('layout.default')

@section('content')
<div class="container" ng-controller="omdbCtrl">
	<div class="page-header">
		<h1>Add a movie</h1>
	</div>

	<p class="text-center" ng-show="loading"><span class="fa fa-refresh fa-spin fa-2x"></span></p>

	<form ng-submit="submitMovieApi(movieData.title)">
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
			<img class="media-object" ng-src="%%movies.Poster%%" alt="%%movies.title%%" width="125" />
		</a>

		<div class="media-body">
			<h4 class="media-heading  movie__title">%%movies.Title%%</h4>
			<span class="movie__year">%%movies.Year%%</span>

			<div class="movie__description">
				%%movies.Plot%%
			</div>

			<p class="movie__director">
				%%movies.Director%%
			</p>

			<div class="movie__stars">
				%%movies.Actors%%
			</div>

			<p class="movie__genre">
				%%movies.Genre%%
			</p>
		</div>
	</div>
</div>
@stop