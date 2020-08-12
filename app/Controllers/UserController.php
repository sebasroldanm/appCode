<?php

namespace App\Controllers;

use App\Models\UsersModel;

class UserController extends BaseController
{
	public function __construct()
	{
		helper('form');
	}

	public function index()
	{
		// dd($this->session->get());
		$userModel = new UsersModel();
		$data['users'] = $userModel->findAll();

		if ($this->session->get('info')) {
			$session = $this->session->get('info');
			if ((strcmp($session['type'], 'error')) == 0) {
				$data['messageData'] = [
					'type' => 'error',
					'message' => $session['message']
				];
			} elseif ((strcmp($session['type'], 'success')) == 0) {
				$data['messageData'] = [
					'type' => 'success',
					'message' => $session['message']
				];
			}
		}
		// dd($data);
		return loadViews("User/index", $data);
	}

	public function destroy()
	{
		$this->session->destroy();
	}

	public function create()
	{
		$data['status'] = 'create';
		if ($this->session->get('info')) {
			$session = $this->session->get('info');
			if ((strcmp($session['type'], 'error')) == 0) {
				$data['messageData'] = [
					'type' => 'error',
					'message' => $session['message']
				];
			} elseif ((strcmp($session['type'], 'success')) == 0) {
				$data['messageData'] = [
					'type' => 'success',
					'message' => $session['message']
				];
			}
		}
		// dd($data, $this->session->get());
		return loadViews('User/create', $data);
	}

	public function save()
	{
		$userModel = new UsersModel();
		$request = \Config\Services::request();
		$data = array(
			'name' => $request->getPostGet('name'),
			'email' => $request->getPostGet('email'),
			'bio' => $request->getPostGet('bio'),
			'username' => $request->getPostGet('username'),
			'password' => $request->getPostGet('password'),
			'role' => $request->getPostGet('role'),
			'created_at' => date("Y-m-d H:i:s")
		);


		if ($userModel->save($data)) {
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
		$userModel = new UsersModel();
		$request = \Config\Services::request();
		$user = $userModel->find($id);
		$data = array('user' => $user);
		return loadViews('User/edit', $data);
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
