<?php use Illuminate\Database\Seeder;
use Stats\User;

class UserSeeder extends Seeder
{
	public function run() {
		User::create(['name'     => "Lucacri",
					  'email'    => 'luca@test.com',
					  'password' => 'testtesttest',
					  'admin'    => TRUE]);
	}
}
