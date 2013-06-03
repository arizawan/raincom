<?php

class Create_Daliveryrules_Table {    

	public function up()
    {
		Schema::create('daliveryrules', function($table) {
			$table->increments('id')->unsigned();
			$table->string('name',100);
			$table->string('description',250);
			$table->string('amount',10);
			$table->string('priority',5);
			$table->string('freeafter',10);
			$table->timestamps();
	});

    }    

	public function down()
    {
		Schema::drop('daliveryrules');

    }

}