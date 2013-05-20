<?php
/* Setting Up |Category| table for |Category Section|*/
class Create_Category {    

	public function up()
    {
		Schema::create('category', function($table) {
			$table->increments('id');
			$table->string('title',40);
			$table->string('link',250);
			$table->string('isspecial',3)->nullable();
			$table->string('linkicon',200)->nullable();
			$table->string('priority',5);
			$table->timestamps();
	});

    }    

	public function down()
    {
		Schema::drop('category');

    }

}