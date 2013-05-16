<?php
/* Setting Up |Controller| table for |Admin Section|*/

class Create_Controllers {    

	public function up()
    {
		Schema::create('controllers', function($table) {
			$table->string('id',70)->primary();
			$table->string('name',100);
			$table->string('email',100);
			$table->string('permission',20);
			$table->string('phone',20);
			$table->timestamp('dob');
			$table->string('skey');
			$table->text('details')->nullable();
			$table->string('photo');
			$table->timestamps();
	});

    }    

	public function down()
    {
		Schema::drop('controllers');

    }

}