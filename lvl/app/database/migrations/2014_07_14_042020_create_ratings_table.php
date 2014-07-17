<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingsTable extends Migration {


	public function up()
	{
		Schema::create('flag', function($table)
        {
			$table->string('location_id');
			$table->string('user_id');
			$table->string('reason');
			$table->string('flag');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('flag');
	}

}