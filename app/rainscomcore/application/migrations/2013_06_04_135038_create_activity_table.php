<?php

class Create_Activity_Table {    

	public function up()
    {
		Schema::create('activities', function($table) {
			$table->increments('id')->unsigned();
			$table->string('users_id',200);
			$table->string('section',200);
			$table->string('nodeid',200);
			$table->string('status',100);
			$table->text('track');
			$table->timestamp('time');
			$table->timestamps();
	});

    }    

	public function down()
    {
		Schema::drop('activities');

    }

}