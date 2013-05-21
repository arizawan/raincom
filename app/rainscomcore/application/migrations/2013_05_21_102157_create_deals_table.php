<?php

class Create_Deals_Table {    

	public function up()
    {
		Schema::create('deals', function($table) {
			$table->increments('id')->unsigned();
			$table->string('dealid',200);
			$table->string('title',100);
			$table->string('innertitle',145);
			$table->string('type',20);
			$table->string('category',200);
			$table->timestamp('startdate')->default('0000-00-00 00:00:00');
			$table->timestamp('enddate')->default('0000-00-00 00:00:00');
			$table->string('circulationstate',3);
			$table->string('circulationoffset',3);
			$table->text('description');
			$table->text('specification');
			$table->text('terms');
			$table->text('couponinfo');
			$table->text('paymenttypes');
			$table->string('linkslug',120);
			$table->timestamps();
	});

    }    

	public function down()
    {
		Schema::drop('deals');

    }

}