<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration {

	public function up()
	{
		Schema::create('locations', function($table)
        {
            $table->increments('id');
			$table->string('country');
			$table->string('state');
			$table->string('city');
            $table->string('name')->unique();
			$table->string('directions');
            $table->timestamps();
        });
	}

	public function down()
	{
        Schema::drop('locations');
    }

}
