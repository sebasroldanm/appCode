<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsersSeeder extends Seeder
{
	public function run()
	{
		$data = [
			[
				'name' => 'Sebastian',
				'email' => 'sebastian@app.com',
				'bio' => 'Soy desarrollador Junior PHP',
				'username' => 'sebasroldanm',
				'password' => '123456',
				'role' => '1',
				'last_login' => date('Y-m-d'),
			],
			[
				'name' => 'Sandra',
				'email' => 'sandra@app.com',
				'bio' => 'Soy Estudiante de la Universida de Cundinamarca',
				'username' => 'sandrau',
				'password' => '123456',
				'role' => '1',
				'last_login' => date('Y-m-d'),
			],
			[
				'name' => 'Camilo',
				'email' => 'camilo@app.com',
				'bio' => 'Soy estudiante de la Universidad de los Andes',
				'username' => 'wsux',
				'password' => '123456',
				'role' => '1',
				'last_login' => date('Y-m-d'),
			]
		];

		foreach ($data as $value) {
			$this->db->table('users')->insert($value);
		}
	}
}
