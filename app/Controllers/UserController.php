<?php

namespace App\Controllers;

use App\Models\UsersModel;

class UserController extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->data['titlePageOne'] = 'WSmith - ';
		$this->data['titlePageTwo'] = 'Usuarios';
	}

	public function index()
	{
		
		$userModel = new UsersModel();
		$this->data['users'] = $userModel->findAll();

		if ($this->session->get('info')) {
			$session = $this->session->get('info');
			if ((strcmp($session['type'], 'error')) == 0) {
				$this->data['messageData'] = [
					'type' => 'error',
					'message' => $session['message']
				];
			} elseif ((strcmp($session['type'], 'success')) == 0) {
				$this->data['messageData'] = [
					'type' => 'success',
					'message' => $session['message']
				];
			}
		}
		return loadViews("User/index", $this->data);
	}

	public function destroy()
	{
		$this->session->destroy();
	}

	public function create()
	{
		$this->data['titlePageOne'] = 'Usuario';
		$this->data['titlePageTwo'] = ' - Crear';

		$this->data['status'] = 'create';
		if ($this->session->get('info')) {
			$session = $this->session->get('info');
			if ((strcmp($session['type'], 'error')) == 0) {
				$this->data['messageData'] = [
					'type' => 'error',
					'message' => $session['message']
				];
			} elseif ((strcmp($session['type'], 'success')) == 0) {
				$this->data['messageData'] = [
					'type' => 'success',
					'message' => $session['message']
				];
			}
		}
		return loadViews('User/create', $this->data);
	}

	public function save()
	{
		$userModel = new UsersModel();
		$request = \Config\Services::request();
		$this->data = array(
			'name' => $request->getPostGet('name'),
			'email' => $request->getPostGet('email'),
			'bio' => $request->getPostGet('bio'),
			'username' => $request->getPostGet('username'),
			'password' => $request->getPostGet('password'),
			'role' => $request->getPostGet('role'),
			'created_at' => date("Y-m-d H:i:s")
		);


		if ($userModel->save($this->data)) {
			$info['info'] = [
				'type' => 'success',
				'message' => ['Bienvenido/a ' . $request->getPostGet('name')]
			];
			$this->session->set($info);
			return redirect()->to('index');
		} else {
			$info['info'] = [
				'type' => 'error',
				'message' => $userModel->errors()
			];

			$this->session->set($info);

			return redirect()->to('create');
		}
	}

	public function edit($id)
	{
		$this->data['titlePageOne'] = 'Usuario';
		$this->data['titlePageTwo'] = ' - Editar';

		$userModel = new UsersModel();
		$request = \Config\Services::request();
		$user = $userModel->find($id);
		// $data = array('user' => $user);
		$this->data['user'] = $user;
		return loadViews('User/edit', $this->data);
	}

	public function update()
	{
		$userModel = new UsersModel();
		$request = \Config\Services::request();

		$user = $userModel->find($request->getPostGet('id'));
		$userAfter = $request->getPostGet('username');
		$userBefore = $user['username'];

		$Form = array(
			'id' => $request->getPostGet('id'),
			'name' => $request->getPostGet('name'),
			'email' => $request->getPostGet('email'),
			'bio' => $request->getPostGet('bio'),
			'username' => $request->getPostGet('username'),
			'password' => $request->getPostGet('password'),
			'role' => $request->getPostGet('role'),
			'update_at' => date("Y-m-d H:i:s")
		);

		$merge = array_merge($user, $Form);

		if (strcmp($userAfter, $userBefore) == 0) {
			unset($merge['username']);
		}

		if ($userModel->save($merge)) {
			$info['info'] = [
				'type' => 'success',
				'message' => ['Usuario Editado Exitosamente']
			];
			$this->session->set($info);
			return redirect()->to('index');
		} else {
			$info['info'] = [
				'type' => 'error',
				'message' => $userModel->errors()
			];
			$this->session->set($info);
			$user = $userModel->find($request->getPostGet('id'));
			$data['user'] = $user;
			return loadViews('User/edit', $data);
		}
	}

	public function delete($id)
	{
		$userModel = new UsersModel();

		if ($id) {
			if ($userModel->delete($id)) {
				$info['info'] = [
					'type' => 'success',
					'message' => ['Usuario Eliminado Exitosamente']
				];
				$this->session->set($info);
			} else {
				$info = [
					'type' => 'error',
					'message' => $userModel->errors()
				];
				$this->session->set($info);
			}
		} else {
			$info = [
				'type' => 'error',
				'message' => ['Usuario no existe']
			];
			$this->session->set($info);
		}
		return redirect()->to(base_url() . '/user/index');
	}

	//--------------------------------------------------------------------

}
