<?php namespace Stats;

use Illuminate\Database\Eloquent\Model;

class Roster extends Model
{
	public $primaryKey = 'roster_id';
	public $table      = 'roster';
	public $timestamps = FALSE;

	public $fillable = [
		'main_id',
		'team_id',
		'season_id',
		'role_id',
		'status_id',
		'leader'
	];

	public function person() {
		return $this->belongsTo(Person::class, 'main_id');
	}

	public function team() {
		return $this->belongsTo(Team::class, 'team_id');
	}

	public function season() {
		return $this->belongsTo(Season::class, 'season_id');
	}

	public function playerRole() {
		return $this->belongsTo(PlayerRole::class, 'role_id');
	}

	public function playerStatus() {
		return $this->belongsTo(PlayerStatus::class, 'status_id');
	}

	public function playerStat() {
		return $this->hasMany(PlayerStat::class, 'roster_id');
	}

	public function scopeIsLeader($query) {
		return $query->where(function ($q) {
			$q->where('leader', 'C')->orWhere('leader', 'A');
		});
	}

	public function scopeSeason($query, Season $season) {
		return $query->where('season_id', $season->season_id);
	}
}
