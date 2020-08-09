<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          		=> [
				'type'           	=> 'INT',
				'constraint'     	=> 5,
				'unsigned'       	=> true,
				'auto_increment'	=> true,
			],
			'name'				=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> '100',
				'null'				=> true,
			],
			'bio' 				=> [
				'type'           	=> 'TEXT',
				'null'           	=> true,
			],
			'username'			=> [
				'type'				=>	'VARCHAR',
				'constraint'		=> '100',
				'null'				=> true,
			],
			'password' 			=> [
				'type'           	=> 'TEXT',
				'null'           	=> true,
			],
			'role' 				=> [
				'type'           	=> 'INT',
				'constraint'     	=> 2,
				'null'           	=> true,
			],
			'last_login' 			=> [
				'type'           	=> 'DATE',
				'null'           	=> false,
			],
			'deleted' 			=> [
				'type'           	=> 'INT',
				'constraint'     	=> 2,
				'null'           	=> true,
				'default'			=> '0',
			],
			'deleted_at' 			=> [
				'type'           	=> 'DATE',
				'null'           	=> false,
				'default'			=> '0',
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('users');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('users');
	}
}
