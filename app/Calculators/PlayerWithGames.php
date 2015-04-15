<?php namespace Stats\Calculators;

use Illuminate\Support\Collection;
use Stats\Person;

class PlayerWithGames
{
	public $person;
	public $games = [];

	public function __construct(Person $person, $games = []) {
		$this->person = $person;
		$this->games = new Collection();
		if (count($games) > 0) $this->games = $games;
	}
}
