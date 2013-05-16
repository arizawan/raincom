<?php
/* Setting Up |Category| table for |Category Section|*/
class Create_Category {    

	public function up()
    {
		Schema::create('category', function($table) {
			$table->string('id',70)->primary();
			$table->string('title',40);
			$table->string('link');
			$table->string('isspecial',1)->nullable();
			$table->string('linkicon')->nullable();
			$table->string('priority',10);
			$table->timestamps();
	});

    }    

	public function down()
    {
		Schema::drop('category');

    }

}