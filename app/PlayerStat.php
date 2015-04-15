<?php namespace Stats;

use Illuminate\Database\Eloquent\Model;

class PlayerStat extends Model
{
	public $primaryKey = 'stats_id';
	public $table      = 'stats';
	public $timestamps = FALSE;

	public $fillable = ['goals', 'assists', 'penaltyminutes'];

	public function roster() {
		return $this->belongsTo(Roster::class, 'main_id');
	}

	public function game() {
		return $this->belongsTo(Game::class, 'game_id');
	}

}
