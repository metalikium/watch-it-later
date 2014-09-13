<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Movies</title>

	<link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}" />
</head>
<body ng-app="movieApp" ng-controller="mainController">
	
	<div class="container">
		<ul class="list">
			<li class="list__item  movie__item" ng-repeat="movie in movies">
				<h3 class="movie__title">%%movie.title%%</h3>
				<span class="movie__year">%%movie.year%%</span>

				<img src="%%movie.poster_url%%" alt="%%movie.title%%" />

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
			</li>
		</ul>
	</div>

	<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
	<script src="{{ asset('bower_components/angular/angular.min.js') }}"></script>
	<script src="{{ asset('js/controllers/mainCtrl.js') }}"></script>
	<script src="{{ asset('js/services/movieService.js') }}"></script>
	<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>