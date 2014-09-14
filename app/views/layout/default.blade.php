<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">

	<title>Movies</title>

	@section('styles')
	<link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('css/styles.css') }}" />
	@show
</head>
<body ng-app="movieApp" ng-controller="mainController">
	<nav id="myNavmenu" class="navmenu navmenu-default navmenu-fixed-left offcanvas" role="navigation">
		<ul class="nav navmenu-nav">
			<span class="navmenu-brand">Menu</span>
			<li><a href="{{ url('/add-movie') }}"><i class="fa fa-film"></i>&nbsp;Add a Movie</a></li>
			<li><a href="#"><i class="fa fa-star"></i>&nbsp;Favorites</a></li>
			<li><a href="#"><i class="fa fa-sign-out"></i>&nbsp;Logout</a></li>
		</ul>
	</nav>
	<div class="navbar navbar-default navbar-fixed-top">
		<button type="button" class="navbar-toggle" style="display: block; float: left;" data-toggle="offcanvas" data-target="#myNavmenu" data-canvas="body">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>

		<a href="{{ url('/') }}" title="Watch it later" class="navbar-brand">Watch it later <small>(alpha)</small></a>
	</div>

	
	@yield('content')

	
	@section('scripts')
	<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
	<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js') }}"></script>
	<script src="{{ asset('bower_components/angular/angular.min.js') }}"></script>
	<script src="{{ asset('js/controllers/mainCtrl.js') }}"></script>
	<script src="{{ asset('js/services/movieService.js') }}"></script>
	<script src="{{ asset('js/app.js') }}"></script>
	@show
</body>
</html>