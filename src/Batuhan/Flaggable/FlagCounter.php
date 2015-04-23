<?php namespace Batuhan\Flaggable;

class FlagCounter extends \Eloquent {

	protected $table = 'flaggable_flag_counters';
	public $timestamps = false;
	protected $fillable = ['flaggable_id', 'flaggable_type', 'count'];
	
	public function flaggable()
	{
		return $this->morphTo();
	}
	
}