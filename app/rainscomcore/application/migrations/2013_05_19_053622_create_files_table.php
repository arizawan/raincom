<?php
/* Setting Up |Files| table for |Files Section|*/
class Create_Files_Table {    

	public function up()
    {
		Schema::create('files', function($table) {
			$table->string('id',70)->primary();
			$table->string('name',120);
			$table->string('location',150);
			$table->string('list',20);
			$table->string('relation',100);
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