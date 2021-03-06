<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function(Blueprint $table)
		{
			$table->engine = 'MyISAM';

			$table->increments('id');
			$table->integer('discussion_id')->unsigned();
			$table->integer('number')->unsigned()->nullable();

			$table->dateTime('time');
			$table->integer('user_id')->unsigned()->nullable();
			$table->string('type')->nullable();
			$table->text('content');
			$table->text('content_html');

			$table->dateTime('edit_time')->nullable();
			$table->integer('edit_user_id')->unsigned()->nullable();
			$table->dateTime('delete_time')->nullable();
			$table->integer('delete_user_id')->unsigned()->nullable();
		});

		// add fulltext index to content (and title?)
		// add unique index on [discussion_id, number] !!!
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('posts');
	}

}
