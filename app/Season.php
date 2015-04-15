<?php namespace Stats;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
	public $primaryKey = 'season_id';
	public $table      = 'lookup_season';
	public $timestamps = FALSE;

	public $fillable = ['season', 'year'];


}
