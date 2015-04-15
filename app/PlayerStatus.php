<?php namespace Stats;

use Illuminate\Database\Eloquent\Model;

class PlayerStatus extends Model
{
	public $primaryKey = 'status_id';
	public $table      = 'lookup_status';
	public $timestamps = FALSE;

	public $fillable = ['status'];
}
