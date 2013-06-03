<?php

class Create_Upsale_Table {    

	public function up()
    {
		Schema::create('upsale', function($table) {
			$table->increments('id')->unsigned();
			$table->string('title',200);
			$table->string('type',30);
			$table->string('assosiatedwith',70);
			$table->text('description');
			$table->string('priority',10);
			$table->string('image',200);
			$table->timestamps();
	});

    }    

	public function down()
    {
		Schema::drop('upsale');

    }

}