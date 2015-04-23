Laravel Flaggable Plugin
============

[![Build Status](https://travis-ci.org/batuhan/laravel-flaggable.svg?branch=master)](https://travis-ci.org/batuhan/laravel-flaggable)
[![Latest Stable Version](https://poser.pugx.org/batuhan/laravel-flaggable/v/stable.svg)](https://packagist.org/packages/batuhan/laravel-flaggable)
[![License](https://poser.pugx.org/batuhan/laravel-flaggable/license.svg)](https://packagist.org/packages/batuhan/laravel-flaggable)

Trait for Laravel Eloquent models to allow easy implementation of a "flag" feature. Only tested with Laravel 5.


#### Composer Install (for Laravel 5)

	composer require batuhan/laravel-flagable "~1.0.0"

#### Install and then run the migrations

```php
'providers' => array(
	'Conner\Likeable\LikeableServiceProvider',
);
```

```bash
php artisan vendor:publish --provider="Conner\Likeable\LikeableServiceProvider"
php artisan migrate
```

#### Setup your models

    class Article extends \Illuminate\Database\Eloquent\Model {
		use Conner\Likeable\LikeableTrait;
	}

#### Sample Usage

	$article->flag(); // like the article for current user
	$article->flag($myUserId); // pass in your own user id
	$article->flag(0); // just add flags to the count, and don't track by user
	
	$article->unflag(); // remove flag from the article
	$article->unflag($myUserId); // pass in your own user id
	$article->unflag(0); // remove flags from the count -- does not check for user
	
	$article->flagCount; // get count of flags
	
	$article->flags; // Iterable Illuminate\Database\Eloquent\Collection of existing flags 
	
	$article->flaged(); // check if currently logged in user flaged the article
	$article->flaged($myUserId);
	
	Article::whereflaged($myUserId) // find only articles where user flaged them
		->with('flagCounter') // highly suggested to allow eager load
		->get();

#### Credits

 - Robert Conner - http://smartersoftware.net