<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Apps', function($table)
		{
			$table->bigIncrements('id');
			$table->bigInteger('account_id')->unsigned()->references('id')->on('Accounts');
			$table->bigInteger('user_id')->unsigned()->references('id')->on('Users');
			$table->string('token')->unique();
			$table->string('name')->default('');
			$table->boolean('active')->default(true);
			$table->boolean('online')->default(true);
			$table->string('slack_api_token')->default('');
			$table->string('slack_invite_user')->default('');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Apps');
	}

}