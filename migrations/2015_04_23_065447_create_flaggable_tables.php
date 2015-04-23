<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFlaggableTables extends Migration {

	public function up() {
		
		Schema::create('flaggable_flags', function(Blueprint $table) {
			$table->increments('id');
			$table->string('flaggable_id', 36);
			$table->string('flaggable_type', 255);
			$table->string('user_id', 36)->index();
			$table->timestamps();
			$table->unique(['flaggable_id', 'flaggable_type', 'user_id'], 'flaggable_flags_unique');
		});
		
		Schema::create('flaggable_flag_counters', function(Blueprint $table) {
			$table->increments('id');
			$table->string('flaggable_id', 36);
			$table->string('flaggable_type', 255);
			$table->integer('count')->unsigned()->default(0);
			$table->unique(['flaggable_id', 'flaggable_type'], 'flaggable_counts');
		});
		
	}

	public function down() {
		Schema::drop('flaggable_flags');
		Schema::drop('flaggable_flag_counters');
	}
}