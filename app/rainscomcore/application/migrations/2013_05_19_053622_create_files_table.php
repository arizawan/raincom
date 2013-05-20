<?php
/* Setting Up |Files| table for |Files Section|*/
class Create_Files_Table {    

	public function up()
    {
		Schema::create('files', function($table) {
			$table->increments('id');
			$table->string('name',120);
			$table->string('location',150);
			$table->string('list',5);
			$table->string('relation',10);
			$table->string('type',20);
			$table->string('status',10);
			$table->timestamps();
	});

    }    

	public function down()
    {
		Schema::drop('files');

    }

}