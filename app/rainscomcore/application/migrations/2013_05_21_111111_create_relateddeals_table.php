<?php

class Create_Relateddeals_Table {    

	public function up()
    {
		Schema::create('relateddeals', function($table) {
			$table->increments('id')->unsigned();
			$table->string('dealid',200);
			$table->string('relatedwith',200);
			$table->string('listing',10);
			$table->timestamps();
	});

    }    

	public function down()
    {
		Schema::drop('relateddeals');

    }

}