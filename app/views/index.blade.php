<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Movies</title>

	<link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('css/styles.css') }}" />
</head>
<body ng-app="movieApp" ng-controller="mainController">
	<nav id="myNavmenu" class="navmenu navmenu-default navmenu-fixed-left offcanvas" role="navigation">
		<ul class="nav navmenu-nav">
			<span class="navmenu-brand">Menu</span>
			<li class ="active"><a href="#">Item 1</a></li>
			<li><a href="#">Item 2</a></li>
			<li><a href="#">Item 3</a></li>
		</ul>
	</nav>
	<div class="navbar navbar-default navbar-fixed-top">
		<a href="/" title="Watch it later" class="logotype">Watch it later</a>

		<button type="button" class="navbar-toggle" style="display: block; float: left;" data-toggle="offcanvas" data-target="#myNavmenu" data-canvas="body">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
	</div>

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
			</li>
		</ul>
	</div>

	<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
	<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js') }}"></script>
	<script src="{{ asset('bower_components/angular/angular.min.js') }}"></script>
	<script src="{{ asset('js/controllers/mainCtrl.js') }}"></script>
	<script src="{{ asset('js/services/movieService.js') }}"></script>
	<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>