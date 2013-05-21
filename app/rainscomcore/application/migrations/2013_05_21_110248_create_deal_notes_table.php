<?php

class Create_Deal_Notes_Table {    

	public function up()
    {
		Schema::create('dealnotes', function($table) {
			$table->increments('id')->unsigned();
			$table->string('dealid',200);
			$table->string('userid',200);
			$table->string('partnerid',200);
			$table->string('priority',3);
			$table->timestamp('time')->default('0000-00-00 00:00:00');
			$table->text('note');
			$table->string('status',10);
			$table->timestamps();
	});

    }    

	public function down()
    {
		Schema::drop('dealnotes');

    }

}