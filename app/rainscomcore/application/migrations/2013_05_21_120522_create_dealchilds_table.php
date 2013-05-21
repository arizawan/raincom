<?php

class Create_Dealchilds_Table {    

	public function up()
    {
		Schema::create('dealchilds', function($table) {
			$table->increments('id')->unsigned();
			$table->string('chinddealid',70);
			$table->string('parentdeal',70);
			$table->string('title',120);
			$table->string('info',250);
			$table->timestamps();
	});

    }    

	public function down()
    {
		Schema::drop('dealchilds');

    }

}