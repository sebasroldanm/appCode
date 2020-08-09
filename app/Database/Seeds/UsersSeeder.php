<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsersSeeder extends Seeder
{
	public function run()
	{
		$data = [
			'name' => 'Sebastian',
			'email' => 'sebastian@app.com',
			'bio' => 'Soy desarrollador Junior PHP',
			'username' => 'sebasroldanm',
			'password' => '123456',
			'role' => '1',
			'last_login' => date('Y-m-d'),
		];

		$this->db->table('users')->insert($data);
	}
}
