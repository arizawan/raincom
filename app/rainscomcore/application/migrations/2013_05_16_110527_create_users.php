<?php
/* Setting Up |Users| table for |User Section|*/
class Create_Users {    

	public function up()
    {

    	// Create user table
		Schema::table(Config::get('sentry::sentry.table.users'), function($table) {
			$table->on(Config::get('sentry::sentry.db_instance'));
			$table->create();
			$table->increments('id')->unsigned();
			$table->string('socailid')->nullable();
			$table->string('username',200);
			$table->string('email')->unique();
			$table->string('password');
			$table->string('password_reset_hash',200)->nullable();
			$table->string('temp_password',200)->nullable();
			$table->string('remember_me',200)->nullable();
			$table->string('activation_hash',200)->nullable();
			$table->string('ip_address',200)->nullable();
			$table->string('status');
			$table->string('activated');
			$table->text('permissions');
			$table->timestamp('last_login');
			$table->timestamps();
		});

		// Create user metadata table
		Schema::table(Config::get('sentry::sentry.table.users_metadata'), function($table) {
			$table->on(Config::get('sentry::sentry.db_instance'));
			$table->create();
			$table->integer('user_id')->primary()->unsigned();
			$table->string('name',120);
			$table->string('phone',20);
			$table->string('company',100)->nullable();
			$table->string('address',200);
			$table->string('city',50);
			$table->string('country',80);
			$table->string('zip',10);
			$table->timestamp('dob')->default('0000-00-00 00:00:00');
			$table->timestamp('jod')->default('0000-00-00 00:00:00');
			$table->string('newsstate',3);
			$table->string('activationhash',250);
			$table->string('image',200)->nullable();
		});

		// Create groups table
		Schema::table(Config::get('sentry::sentry.table.groups'), function($table) {
			$table->on(Config::get('sentry::sentry.db_instance'));
			$table->create();
			$table->increments('id')->unsigned();
			$table->string('name')->unique();
			$table->text('permissions');
		});

		// Create users group relation table
		Schema::table(Config::get('sentry::sentry.table.users_groups'), function($table) {
			$table->on(Config::get('sentry::sentry.db_instance'));
			$table->create();
			$table->integer('user_id')->unsigned();
			$table->integer('group_id')->unsigned();
		});

		// Create suspension table
		Schema::table(Config::get('sentry::sentry.table.users_suspended'), function($table) {
			$table->on(Config::get('sentry::sentry.db_instance'));
			$table->create();
			$table->increments('id')->unsigned();
			$table->string('login_id');
			$table->integer('attempts');
			$table->string('ip');
			$table->timestamp('last_attempt_at');
			$table->timestamp('suspended_at');
			$table->timestamp('unsuspend_at');
		});

		// Create rules table
		Schema::table(Config::get('sentry::sentry.table.rules'), function($table) {
			$table->on(Config::get('sentry::sentry.db_instance'));
			$table->create();
			$table->increments('id')->unsigned();
			$table->string('rule')->unique();
			$table->string('description')->nullable();
		});

		// Insert default values rules
		DB::connection(Config::get('sentry::sentry.db_instance'))
			->table(Config::get('sentry::sentry.table.rules'))
			->insert(array('rule' => 'superuser', 'description' => 'Access to Everything'));
		DB::connection(Config::get('sentry::sentry.db_instance'))
			->table(Config::get('sentry::sentry.table.rules'))
			->insert(array('rule' => 'is_admin', 'description' => 'Administrative Privileges'));
		DB::connection(Config::get('sentry::sentry.db_instance'))
			->table(Config::get('sentry::sentry.table.rules'))
			->insert(array('rule' => 'create', 'description' => 'Creating Things'));
		DB::connection(Config::get('sentry::sentry.db_instance'))
			->table(Config::get('sentry::sentry.table.rules'))
			->insert(array('rule' => 'update', 'description' => 'Updating Things'));
		DB::connection(Config::get('sentry::sentry.db_instance'))
			->table(Config::get('sentry::sentry.table.rules'))
			->insert(array('rule' => 'delete', 'description' => 'Deleting things'));
		DB::connection(Config::get('sentry::sentry.db_instance'))
			->table(Config::get('sentry::sentry.table.rules'))
			->insert(array('rule' => 'is_partner', 'description' => 'Partner Access'));
		DB::connection(Config::get('sentry::sentry.db_instance'))
			->table(Config::get('sentry::sentry.table.rules'))
			->insert(array('rule' => 'is_user', 'description' => 'User Access'));

		// Insert default values groups
		DB::connection(Config::get('sentry::sentry.db_instance'))
			->table(Config::get('sentry::sentry.table.groups'))
			->insert(array('name' => 'superuser', 'permissions' => '{"superuser":1,"is_admin":1,"create":1,"update":1,"delete":1,"is_partner":1,"is_user":1}'));
		DB::connection(Config::get('sentry::sentry.db_instance'))
			->table(Config::get('sentry::sentry.table.groups'))
			->insert(array('name' => 'admin', 'permissions' => 		'{"is_admin":1,"modaretor":1,"create":1,"update":1,"delete":1,"is_partner":1}'));
		DB::connection(Config::get('sentry::sentry.db_instance'))
			->table(Config::get('sentry::sentry.table.groups'))
			->insert(array('name' => 'partner', 'permissions' => 	'{"update":1,"is_partner":1}'));
		DB::connection(Config::get('sentry::sentry.db_instance'))
			->table(Config::get('sentry::sentry.table.groups'))
			->insert(array('name' => 'user', 'permissions' => 		'{"update":1,"is_user":1}'));
		DB::connection(Config::get('sentry::sentry.db_instance'))
			->table(Config::get('sentry::sentry.table.groups'))
			->insert(array('name' => 'smalladmin', 'permissions' => '{"is_admin":1,"create":1,"update":1}'));
		
    }    

	public function down()
    {
		// Drop all tables
		Schema::table(Config::get('sentry::sentry.table.users'), function($table) {
			$table->on(Config::get('sentry::sentry.db_instance'));
			$table->drop();
		});

		Schema::table(Config::get('sentry::sentry.table.users_metadata'), function($table) {
			$table->on(Config::get('sentry::sentry.db_instance'));
			$table->drop();
		});

		Schema::table(Config::get('sentry::sentry.table.groups'), function($table) {
			$table->on(Config::get('sentry::sentry.db_instance'));
			$table->drop();
		});

		Schema::table(Config::get('sentry::sentry.table.users_groups'), function($table) {
			$table->on(Config::get('sentry::sentry.db_instance'));
			$table->drop();
		});

		Schema::table(Config::get('sentry::sentry.table.users_suspended'), function($table) {
			$table->on(Config::get('sentry::sentry.db_instance'));
			$table->drop();
		});

		// Drop rules table
		Schema::table(Config::get('sentry::sentry.table.rules'), function($table) {
			$table->on(Config::get('sentry::sentry.db_instance'));
			$table->drop();
		});

    }

}