<?php namespace Batuhan\Flaggable;

class Flag extends \Eloquent {

	protected $table = 'flaggable_flags';
	public $timestamps = true;
	protected $fillable = ['flaggable_id', 'flaggable_type', 'user_id'];

	public function flaggable()
	{
		return $this->morphTo();
	}
	
}