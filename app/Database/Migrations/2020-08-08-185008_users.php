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
				'null'				=> false,
			],
			'email'				=> [
				'type'				=> 'TEXT',
				'null'				=> false,
			],
			'bio' 				=> [
				'type'           	=> 'TEXT',
				'null'           	=> true,
			],
			'username'			=> [
				'type'				=>	'VARCHAR',
				'constraint'		=> '100',
				'null'				=> false,
			],
			'password' 			=> [
				'type'           	=> 'TEXT',
				'null'           	=> false,
			],
			'role' 				=> [
				'type'           	=> 'INT',
				'constraint'     	=> 2,
				'null'           	=> false,
			],
			'last_login' 			=> [
				'type'           	=> 'DATE',
				'null'           	=> false,
			],
			'deleted' 			=> [
				'type'           	=> 'INT',
				'constraint'     	=> 1,
				'null'           	=> false,
				'default'			=> '0',
			],
			'created_at' 			=> [
				'type'           	=> 'DATE',
				'null'           	=> false,
			],
			'updated_at' 			=> [
				'type'           	=> 'DATE',
				'null'           	=> true,
			],
			'deleted_at' 			=> [
				'type'           	=> 'DATE',
				'null'           	=> true,
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
