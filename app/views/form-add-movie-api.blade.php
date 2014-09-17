@extends('layout.default')

@section('content')
<div class="container" ng-controller="omdbCtrl">
	<div class="page-header">
		<h1>Add a movie</h1>
	</div>

	<p class="text-center" ng-show="loading"><span class="fa fa-refresh fa-spin fa-2x"></span></p>
	
	<!-- Find movie -->
	<form ng-submit="submitMovieApi()" ng-hide="loading">
		<input type="hidden" name="title" value="%%movie.Title%%" />
		<input type="hidden" name="year" value="%%movie.Year%%" />
		<input type="hidden" name="poster_url" value="%%movie.Poster%%" />
		<input type="hidden" name="description" value="%%movie.Plot%%" />
		<input type="hidden" name="director" value="%%movie.Director%%" />
		<input type="hidden" name="stars" value="%%movie.Actors%%" />
		<input type="hidden" name="genre" value="%%movie.Genre%%" />

		<div class="form-group">
			<input type="text" class="form-control" name="title" ng-model="movieTitle" placeholder="Title" />
		</div>

		<div class="form-group text-right">	
			<button type="button" ng-click="findMovieApi(movieTitle)" class="btn btn-primary btn-lg btn-block">
				<i class="fa fa-search"></i> Find
			</button>
		</div>

		<div ng-if="movie">
		
			<pre>%%movie%%</pre>

			<div class="media">
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

			<!-- Save movie form -->
			<div class="row">
				<div class="col-lg-6 col-xs-12">
					<button type="button" ng-click="resetForm()" class="btn btn-danger btn-lg btn-block">
						<i class="fa fa-times"></i> Reset
					</button>
				</div>
				<div class="col-lg-6 col-xs-12">
					<button type="submit" class="btn btn-success btn-lg btn-block">
						<i class="fa fa-check"></i> Save
					</button>
				</div>
			</div>
		</div>
	</form>


	<div ng-show="emsg" class="alert alert-danger">
		<p>%%movie.Error%%</p>
	</div>

</div>
@stop