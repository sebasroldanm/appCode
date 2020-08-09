<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Newsletter extends Migration
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
			'email'				=> [
				'type'				=> 'TEXT',
				'null'				=> true,
			],
			'deleted' 			=> [
				'type'           	=> 'INT',
				'constraint'     	=> 2,
				'null'           	=> true,
			],
			'add_at' 			=> [
				'type'           	=> 'DATE',
				'null'           	=> false,
			],
			'deleted_at' 			=> [
				'type'           	=> 'DATE',
				'null'           	=> false,
				'default'			=> '0',
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('newsletter');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('newsletter');
	}
}
