<?php

class Create_Payment_Table {    

	public function up()
    {
		Schema::create('payment', function($table) {
			$table->increments('id')->unsigned();
			$table->string('orderid',20);
			$table->string('transid',20);
			$table->string('type',3);
			$table->string('status',20);
			$table->string('amount',200);
			$table->text('note');
			$table->timestamp('dateplaced')->default('0000-00-00 00:00:00');
			$table->timestamp('datesuccess')->default('0000-00-00 00:00:00');
			$table->timestamps();
	});

    }    

	public function down()
    {
		Schema::drop('payment');

    }

}