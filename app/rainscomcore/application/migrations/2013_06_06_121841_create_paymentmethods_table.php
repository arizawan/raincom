<?php

class Create_Paymentmethods_Table {    

	public function up()
    {
		Schema::create('paymentmethods', function($table) {
			$table->increments('id');
			$table->string('name');
			$table->string('function');
			$table->string('status');
			$table->timestamps();
	});

    }    

	public function down()
    {
		Schema::drop('paymentmethods');

    }

}