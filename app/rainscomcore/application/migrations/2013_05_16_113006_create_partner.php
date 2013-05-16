<?php
/* Setting Up |Partners| table for |Partner Section|*/
class Create_Partner {    

	public function up()
    {
		Schema::create('partners', function($table) {
			$table->string('id',70)->primary();
			$table->string('name',100);
			$table->string('address',300);
			$table->text('details')->nullable();
			$table->string('email',120);
			$table->string('phone',20);
			$table->string('latitude',70)->nullable();
			$table->string('longitude',70)->nullable();
			$table->string('image');
			$table->string('isvisible',5);
			$table->string('inactionable',5);
			$table->timestamp('inactiveat');
			$table->string('skey');
			$table->timestamps();
	});

    }    

	public function down()
    {
		Schema::drop('partners');

    }

}