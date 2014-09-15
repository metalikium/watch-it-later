<?php

class Movie extends \Eloquent {
	protected $fillable = ['title', 'year', 'poster_url', 'description', 'director', 'stars', 'genre'];
}