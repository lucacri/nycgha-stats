<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserManagedTeam extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('users',
			function (Blueprint $table) {
				$table->integer('manages_team_id')->nullable();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('users',
			function (Blueprint $table) {
				$table->dropColumn('manages_team_id');
			});
	}

}
