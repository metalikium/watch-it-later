@extends('layout.default')

@section('content')
<div class="container">
	<div class="page-header">
		<h1>Create a movie</h1>
	</div>

	<form ng-submit="submitMovie()">
		<!-- title -->
		<div class="form-group">
			<input type="text" class="form-control" name="movie_title" ng-model="movieData.title" placeholder="Title" />
		</div>

		<!-- year -->
		<div class="form-group">
			<!--
			<select name="movie_title" ng-model="movieData.year" ng-options="year.yearValue for year in years" class="form-control">
				<option value="">Year</option>
				<option ng-repeat="year in years" value="%%year.yearValue%%">%%year.yearName%%</option>
			</select>
			 -->

			<select name="movie_title" ng-model="movieData.year" class="form-control">
				<option value="">Year</option>
				<option ng-repeat="year in years" value="%%year.yearValue%%">%%year.yearName%%</option>
			</select>
		</div>

		<!-- description -->
		<div class="form-group">
			<textarea class="form-control" rows="3" name="movie_description" ng-model="movieData.description" placeholder="Description"></textarea>
		</div>

		<!-- director -->
		<div class="form-group">
			<input type="text" class="form-control" name="movie_director" ng-model="movieData.director" placeholder="Director" />
		</div>

		<!-- genre -->
		<div class="form-group">
			<input type="text" class="form-control" name="movie_genre" ng-model="movieData.genre" placeholder="Genre" />
		</div>

		<!-- submit -->
		<div class="form-group text-right">	
			<button type="submit" class="btn btn-primary btn-lg btn-block">Save</button>
		</div>
	</form>
</div>
@stop