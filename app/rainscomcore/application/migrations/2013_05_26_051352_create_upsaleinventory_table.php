<?php

class Create_Upsaleinventory_Table {    

	public function up()
    {
		Schema::create('upsaleinventory', function($table) {
			$table->increments('id')->unsigned();
			$table->string('upsaleid',200);
			$table->string('type',10);
			$table->string('originalprice',100);
			$table->string('businessprice',100);
			$table->string('discount',3);
			$table->string('quantity',100);
			$table->string('quantitysold',100);
			$table->string('soldoutlimit',3);
			$table->string('status',10);
			$table->timestamps();
	});

    }    

	public function down()
    {
		Schema::drop('upsaleinventory');

    }

}