@extends('layout.default')

@section('content')
<div class="container">
	<div class="page-header">
		<h1>Movies list</h1>
	</div>

	<p class="text-center" ng-show="loading"><span class="fa fa-refresh fa-spin fa-2x"></span></p>

	<ul class="list" ng-hide="loading">
		<li class="list__item  movie__item" ng-repeat="movie in movies">
			<h3 class="movie__title">%%movie.title%%</h3>
			<span class="movie__year">%%movie.year%%</span>

			<img ng-src="%%movie.poster_url%%" alt="%%movie.title%%" />

			<div class="movie__description">
				%%movie.description%%
			</div>

			<p class="movie__director">
				%%movie.director%%
			</p>

			<div class="movie__stars">
				%%movie.stars%%
			</div>

			<p class="movie__genre">
				%%movie.genre%%
			</p>

			<p>
				<a href="#" ng-click="deleteMovie(movie.id)" class="text-muted"><i class="fa fa-trash-o"></i>&nbsp;Delete</a>
			</p>
		</li>
	</ul>
</div>
@stop