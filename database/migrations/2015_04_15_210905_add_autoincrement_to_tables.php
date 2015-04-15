<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAutoincrementToTables extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		\DB::statement('ALTER TABLE roster MODIFY COLUMN roster_id INT auto_increment');
		\DB::statement('ALTER TABLE game MODIFY COLUMN game_id INT auto_increment');
		\DB::statement('ALTER TABLE lookup_season MODIFY COLUMN season_id INT auto_increment');
		\DB::statement('ALTER TABLE lookup_team MODIFY COLUMN team_id INT auto_increment');
		\DB::statement('ALTER TABLE main MODIFY COLUMN main_id INT auto_increment');
		\DB::statement('ALTER TABLE stats MODIFY COLUMN stats_id INT auto_increment');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		//
	}

}
