<?php namespace Stats;

use Illuminate\Database\Eloquent\Model;

class PersonEmail extends Model
{
	public $primaryKey = 'email_id';
	public $table      = 'email';
	public $timestamps = FALSE;

	public $fillable = ['email', 'isprimary'];
}
