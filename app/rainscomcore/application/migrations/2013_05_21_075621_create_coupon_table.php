<?php

class Create_Coupon_Table {    

	public function up()
    {
		Schema::create('coupon', function($table) {
			$table->increments('id')->unsigned();
			$table->string('status',10);
			$table->string('issuedfor',200);
			$table->string('code',200);
			$table->string('discount',3);
			$table->text('description');
			$table->string('activationhash',220);
			$table->text('activationurl');
			$table->timestamp('createddate')->default('0000-00-00 00:00:00');
			$table->timestamp('expairdate')->default('0000-00-00 00:00:00');
			$table->string('foritem');
			$table->string('dealid');
			$table->string('userid');
			$table->string('partnerid');
			$table->timestamps();
	});

    }    

	public function down()
    {
		Schema::drop('coupon');

    }

}