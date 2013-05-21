<?php

class Create_Delivery_Table {    

	public function up()
    {
		Schema::create('delivery', function($table) {
			$table->increments('id')->unsigned();
			$table->string('orderid',200);
			$table->string('with',200);
			$table->string('shortcode',70);
			$table->timestamp('placedat')->default('0000-00-00 00:00:00');
			$table->timestamp('successat')->default('0000-00-00 00:00:00');
			$table->string('approvedby',200);
			$table->text('address');
			$table->string('orderedby',200);
			$table->string('status',10);
			$table->text('note');
			$table->timestamps();
	});

    }    

	public function down()
    {
		Schema::drop('delivery');

    }

}