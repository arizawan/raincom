<?php

class Create_Order_Item_Table {    

	public function up()
    {
		Schema::create('order_items', function($table) {
			$table->increments('id')->unsigned();
			$table->string('orderid',20);
			$table->string('itemid',20);
			$table->string('quantity',3);
			$table->string('price',200);
			$table->string('totalprice',200);
			$table->string('type',3);
			$table->timestamps();
	});

    }    

	public function down()
    {
		Schema::drop('order_items');

    }

}