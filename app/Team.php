<?php namespace Stats;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
	public $primaryKey = 'team_id';
	public $table      = 'lookup_team';
	public $timestamps = FALSE;

	public $fillable = ['teamname', 'location', 'division', 'active', 'description', 'logo_url'];

	public function url() {
		return \URL::route('team', [str_slug($this->teamname, '-')]);
	}

	public function currentSeasonNumber() {
		return $this->roster()->max('season_id');
	}

	public function captains() {
		$season = $this->currentSeasonNumber();

		return $this->roster()->with('person')->isLeader()->where('season_id', $season)->orderBy('leader', 'desc');
	}

	public function roster() {
		return $this->hasMany(Roster::class);
	}

	public function games() {
		return $this->hasMany(Game::class, 'ghateam_id');
	}

	public function seasons() {
		$seasons = array_unique($this->games()->lists('season_id'));
		return Season::whereIn('season_id', $seasons)->get();
	}

	public function scopeActive($q) {
		return $q->where('active', 1);
	}

	public function logo() {
		if ($this->logo_url) return $this->logo_url;

		return 'http://www.nycgha.org/wp-content/uploads/2014/01/xnycgha_logo.jpg.pagespeed.ic.Z0EN9Cb6Rq.jpg';
	}

	public function currentSeason() {
		return $this->roster()->with(['person', 'playerStat'])->where('season_id', $this->currentSeasonNumber());
	}

	public function allSeasons() {
		return $this->roster()->with(['person', 'playerStat']);
	}
}
