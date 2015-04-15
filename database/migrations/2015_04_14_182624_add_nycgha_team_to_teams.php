<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNycghaTeamToTeams extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('lookup_team',
			function (Blueprint $table) {
				$table->boolean('active')->default(FALSE);
				$table->text('description')->nullable();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('lookup_team',
			function (Blueprint $table) {
				$table->dropColumn('active');
				$table->dropColumn('description');
			});
	}

}
