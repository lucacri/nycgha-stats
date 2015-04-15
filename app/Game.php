<?php namespace Stats;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
	public $primaryKey = 'game_id';
	public $table      = 'game';
	public $timestamps = FALSE;

	public function getDates() {
		return [
			'datetime'
		];
	}

	public $fillable = ['datetime',
						'goalsagainst',
						'overtimestatus',
						'playoffflag',
						'season_id',
						'otherteam_id',
						'ghateam_id'];

	public function ghaTeam() {
		return $this->belongsTo(Team::class, 'ghateam_id');
	}

	public function otherTeam() {
		return $this->belongsTo(Team::class, 'otherteam_id');
	}

	public function season() {
		return $this->belongsTo(Season::class, 'season_id');
	}
}
