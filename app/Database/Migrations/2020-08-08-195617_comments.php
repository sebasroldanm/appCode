<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Comments extends Migration
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
			'post_id'			=> [
				'type'				=> 'INT',
				'constraint'     	=> 5,
				'unsigned'       	=> true,
				'null'				=> true,
			],
			'name' 				=> [
				'type'           	=> 'TEXT',
				'null'           	=> true,
			],
			'name'				=> [
				'type'				=> 'TEXT',
				'null'				=> true,
			],
			'email' 			=> [
				'type'           	=> 'TEXT',
				'null'           	=> true,
			],
			'comment' 			=> [
				'type'           	=> 'TEXT',
				'null'           	=> true,
			],
			'date' 				=> [
				'type'           	=> 'DATE',
				'null'           	=> false,
			],
			'deleted_at' 		=> [
				'type'           	=> 'DATE',
				'null'           	=> false,
				'default'			=> '0',
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('comments');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('comments');
	}
}
