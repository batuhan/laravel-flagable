<?php namespace Batuhan\Flaggable;

use Illuminate\Support\ServiceProvider;

/**
 * Copyright (c) 2015 Robert Conner
 */

class FlaggableServiceProvider extends ServiceProvider {

	protected $defer = true;
	
	public function boot() {
		$this->publishes([
			__DIR__.'/../../../migrations/2015_04_23_065447_create_flaggable_tables.php' => base_path('database/migrations/2014_09_10_065447_create_likeable_tables.php'),
		]);
	}
	
	public function register() {}

	public function when() {
		return array('artisan.start');
	}
	
}