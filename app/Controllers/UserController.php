<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsersModel;

class UserController extends BaseController
{
	public function __construct()
	{
		helper('form');
	}

	public function index()
	{
		$userModel = new UsersModel($db);

		// $userModel->find([1, 2]);
		// $userModel->findAll();
		// $userModel->where('email', 'Pacocha@app.com')->findAll();
		// $userModel->find(2, 4);
		// $result['users'] = $userModel->onlyDeleted()->findAll();

		/* 
		$data = [
			'name' => 'Juan',
			'email' => 'Juan@app.com',
			'bio' => 'Similique dolorem asperiores unde non nisi ipsa eum non. Ipsum quo natus dolore saepe. Eligendi qui iure nam veritatis qui provident est.',
			'username' => 'juanpis',
			'password' => '123456789',
			'role' => '1',
			'created_at' => date('Y-m-d H:i:s')
		];
 */

		// $userModel->insert($data);
		// $userModel->update(22, $data);

		/* 
		$data = [
			'role' => '2',
			'updated_at' => date('Y-m-d H:i:s')
		];
		$userModel->update([21, 22, 23], $data);
 */
		// $userModel->whereIn('id', [21, 23])->set(['role' => 1])->update();

		/* 
		$data = [
			'name' => 'sandra',
			'email' => 'sandra@app.com',
			'bio' => 'Similique dolorem asperiores unde non nisi ipsa eum non. Ipsum quo natus dolore saepe. Eligendi qui iure nam veritatis qui provident est.',
			'username' => 'juanpis',
			'password' => '123456789',
			'role' => '1',
			'created_at' => date('Y-m-d H:i:s')
		];
		$data = [
			'id' =>'21',
			'name' => 'sandra',
			'email' => 'sandra@app.com',
			'bio' => 'Similique dolorem asperiores unde non nisi ipsa eum non. Ipsum quo natus dolore saepe. Eligendi qui iure nam veritatis qui provident est.',
			'username' => 'juanpis',
			'password' => '123456789',
			'role' => '1',
			'created_at' => date('Y-m-d H:i:s')
		];

		$userModel->save($data);//	GUARDA SI NO TIENE ID, EDITA SI TIENE ID
 */


		// $userModel->delete(23);
		// $userModel->delete([21, 22]);
		// $userModel->where('name', 'Sebastian')->delete();
		// $userModel->purgeDeleted();	//Purgan todos los que estan eliminados suavemente


/*
		*************************************************************************************
		  						VALIDACIONES


		$data = [
			'name' => 'sa%&/(',
			'email' => 'sandra@app.com',
			'bio' => 'Similique dolorem asperiores unde non nisi ipsa eum non. Ipsum quo natus dolore saepe. Eligendi qui iure nam veritatis qui provident est.',
			'username' => 'juanpis',
			'password' => '123456789',
			'role' => '1',
			'created_at' => date('Y-m-d H:i:s')
		];
 
		if (!$userModel->save($data)) {
			dd($userModel->errors());
		} 
*/



		$result['users'] = $userModel->findAll();


		return loadViews("user", $result);
	}

	public function create()
	{
		loadViews('User/create');
	}

	public function edit()
	{
		return view('home');
	}

	//--------------------------------------------------------------------

}
