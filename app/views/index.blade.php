@extends('layout.default')

@section('content')
<div class="container">
	<div class="page-header">
		<h1>Movies list</h1>
	</div>

	<p class="text-center" ng-show="loading"><span class="fa fa-refresh fa-spin fa-2x"></span></p>

	<div class="media" ng-hide="loading" ng-if="movies" ng-repeat="movie in movies">
		<a class="pull-left" href="#">
			<img class="media-object" src="{{ asset('img/default.gif') }}" ng-src="%%movie.poster_url%%" alt="%%movie.title%%" width="125" />
		</a>

		<div class="media-body">
			<h4 class="media-heading  movie__title">%%movie.title%%</h4>
			<span class="movie__year">%%movie.year%%</span>

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
			
			<!-- movie rating -->
			<rating ng-model="rate" max="max" readonly="isReadonly" ng-click="ratingMovie(rate, movie.id)" on-hover="hoveringOver(value)" on-leave="overStar = null"></rating>
			<span class="label" ng-class="{'label-warning': percent<30, 'label-info': percent>=30 && percent<70, 'label-success': percent>=70}" ng-show="overStar && !isReadonly">%%percent%% %</span>

			<pre style="margin:15px 0;">Rate: <b>%%rate%%</b> - Readonly is: <i>%%isReadonly%%</i> - Hovering over: <b>%%overStar || "none"%%</b></pre>
			<!-- /movie rating -->


			<p>
				<a href="#" ng-click="deleteMovie(movie.id)" class="text-muted"><i class="fa fa-trash-o"></i>&nbsp;Delete</a>
			</p>
		</div>
	</div>
</div>
@stop