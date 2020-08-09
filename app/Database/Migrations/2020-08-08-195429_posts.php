<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Posts extends Migration
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
			'banner'			=> [
				'type'				=> 'TEXT',
				'null'				=> true,
			],
			'title' 			=> [
				'type'           	=> 'TEXT',
				'null'           	=> true,
			],
			'slug'				=> [
				'type'				=>'TEXT',
				'null'				=> true,
			],
			'intro' 			=> [
				'type'           	=> 'TEXT',
				'null'           	=> true,
			],
			'content' 			=> [
				'type'           	=> 'TEXT',
				'null'           	=> true,
			],
			'category' 			=> [
				'type'           	=> 'INT',
				'constraint'     	=> 2,
				'null'           	=> true,
			],
			'tags' 				=> [
				'type'           	=> 'TEXT',
				'null'           	=> true,
			],
			'show_home' 		=> [
				'type'           	=> 'INT',
				'constraint'     	=> 2,
				'null'           	=> true,
			],
			'id_user' 			=> [
				'type'           	=> 'INT',
				'constraint'     	=> 2,
				'null'           	=> true,
			],
			'created_at'		=> [
				'type'           	=> 'DATE',
				'null'           	=> true,
			],
			'created_by'		=> [
				'type'           	=> 'INT',
				'constraint'     	=> 2,
				'null'           	=> true,
			],
			'deleted' 			=> [
				'type'           	=> 'INT',
				'constraint'     	=> 2,
				'null'           	=> true,
			],
			'deleted_at' 			=> [
				'type'           	=> 'DATE',
				'null'           	=> false,
				'default'			=> '0',
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('posts');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('posts');
	}
}
