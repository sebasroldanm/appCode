<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Blog extends Seeder
{
	public function run()
	{
		$this->call('CategoriesSeeder');
		// $this->call('UsersSeeder');
		$this->call('UsersDevSeeder');
	}
}
