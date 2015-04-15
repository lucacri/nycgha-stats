<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLogoToTeams extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('lookup_team',
			function (Blueprint $table) {
				$table->text('logo_url')->nullable();
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
				$table->dropColumn('logo_url');
			});
	}

}
