<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Categories extends Migration
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
			'description' 			=> [
				'type'           	=> 'TEXT',
				'null'           	=> true,
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
		$this->forge->createTable('categories');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('categories');
	}
}
