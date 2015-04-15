<?php  namespace Stats; 

use Illuminate\Database\Eloquent\Model;

class PlayerRole extends Model
{
	public $primaryKey = 'role_id';
	public $table      = 'lookup_role';
	public $timestamps = FALSE;

	public $fillable = ['role'];
}
