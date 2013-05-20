<?php
/* Setting Up |Partners| table for |Partner Section|*/
class Create_Partner {    

	public function up()
    {
		Schema::create('partners', function($table) {
			$table->increments('id');
			$table->string('name',100);
			$table->string('address',300);
			$table->text('details')->nullable();
			$table->string('email',120);
			$table->string('phone',20);
			$table->string('latitude',70)->nullable();
			$table->string('longitude',70)->nullable();
			$table->string('image',200)->nullable();
			$table->string('isvisible',3);
			$table->string('pincode',5);
			$table->string('activestate');
			$table->timestamp('statechangedon');
			$table->string('password',250);
			$table->timestamps();
	});

    }    

	public function down()
    {
		Schema::drop('partners');

    }

}