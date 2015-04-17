<?php namespace Stats;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
	public $primaryKey = 'main_id';
	public $table      = 'main';
	public $timestamps = FALSE;

	public $fillable = [
		'fname',
		'lname',
		'phone_home',
		'phone_work',
		'phone_mobile',
		'address1',
		'address2',
		'city',
		'state',
		'postalcode',
		'country',
		'gender',
		'birthdate',
	];

	public function getDates() {
		return ['birthdate'];
	}

	public function emails() {
		return $this->hasMany(PersonEmail::class);
	}

	public function fullName() {
		return $this->fname . ' ' . $this->lname;
	}

	public function getFullNameAttribute($value) {
		return $this->attributes['fname'] . ' ' . $this->attributes['lname'];
	}
}
