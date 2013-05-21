<?php

class Create_Inventory_Table {    

	public function up()
    {
		Schema::create('inventory', function($table) {
			$table->increments('id')->unsigned();
			$table->string('dealid',200);
			$table->string('originalprice',100);
			$table->string('businessprice',100);
			$table->string('discount',3);
			$table->string('quantity',100);
			$table->string('quantitysold',100);
			$table->string('status',10);
			$table->timestamps();
	});

    }    

	public function down()
    {
		Schema::drop('inventory');

    }

}