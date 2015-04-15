<?php namespace Stats\Calculators;

use Stats\Person;

class StatCalculator
{
	public $person;
	public $gamesPlayed    = 0;
	public $goals          = 0;
	public $assists        = 0;
	public $points         = 0;
	public $penaltyMinutes = 0;

	public function __construct(Person $person, $stats = []) {
		$this->person = $person;
		$this->gamesPlayed = count($stats);
		$this->goals = $stats->sum('goals');
		$this->assists = $stats->sum('assists');
		$this->points = $this->goals + $this->assists;
		$this->penaltyMinutes = $stats->sum('penaltyminutes');
	}

	public function goalsPerGame() {
		if(intval($this->gamesPlayed) == 0) return 0;
		return $this->formatNumber($this->goals / $this->gamesPlayed);
	}

	public function assistsPerGame() {
		if(intval($this->gamesPlayed) == 0) return 0;
		return $this->formatNumber($this->assists / $this->gamesPlayed);
	}

	public function pointsPerGame() {
		if(intval($this->gamesPlayed) == 0) return 0;
		return $this->formatNumber($this->points / $this->gamesPlayed);
	}

	public function penaltyMinutesPerGame() {
		if(intval($this->gamesPlayed) == 0) return 0;
		return $this->formatNumber($this->penaltyMinutes / $this->gamesPlayed);
	}

	private function formatNumber($number) {
		return number_format($number, 3, '.', '');
	}

}
