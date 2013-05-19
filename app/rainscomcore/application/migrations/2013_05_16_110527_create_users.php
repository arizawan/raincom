<?php
/* Setting Up |Users| table for |User Section|*/
class Create_Users {    

	public function up()
    {
		Schema::create('users', function($table) {
			$table->string('id',70)->primary();
			$table->string('name',100);
			$table->string('email',120);
			$table->string('phone',20);
			$table->string('company',100)->nullable();
			$table->string('address',200);
			$table->string('city',50);
			$table->string('country',60);
			$table->string('zip',15);
			$table->string('socailid')->nullable();
			$table->timestamp('dob');
			$table->string('newsstate',5);
			$table->string('skey');
			$table->string('permission',20);
			$table->timestamps();
	});

    }    

	public function down()
    {
		Schema::drop('users');

    }

}