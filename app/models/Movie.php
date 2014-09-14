<?php

class Movie extends \Eloquent {
	protected $fillable = ['title', 'year', 'description', 'director', 'genre'];
}