<?php

class Create_Order_Table {    

	public function up()
    {
		Schema::create('order', function($table) {
			$table->increments('id')->unsigned();
			$table->string('code',200);
			$table->string('userid');
			$table->string('status',10);
			$table->text('note');
			$table->string('paymentid',200);
			$table->timestamp('ordertime')->default('0000-00-00 00:00:00');
			$table->timestamps();
	});

    }    

	public function down()
    {
		Schema::drop('order');

    }

}