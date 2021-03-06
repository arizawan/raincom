<?php
/* Setting Up |Category| table for |Category Section|*/
class Create_Category {    

	public function up()
    {
		Schema::create('category', function($table) {
			$table->increments('id');
			$table->string('title',40);
			$table->string('parent',200);
			$table->string('isspecial',3)->nullable();
			$table->string('linkicon',200)->nullable();
			$table->string('priority',5);
			$table->string('linkslug',50);
			$table->timestamps();
	});

    }    

	public function down()
    {
		Schema::drop('category');

    }

}