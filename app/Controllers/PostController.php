<?php

namespace App\Controllers;

use App\Models\CategoriesModel;
use App\Models\CommentsModel;
use App\Models\PostsModel;
use App\Models\UsersModel;

class PostController extends BaseController
{
	public function __construct()
	{
		helper(["url", "form"]);
		$this->data['titlePageOne'] = 'WSmith - ';
		$this->data['titlePageTwo'] = 'Post';
	}

	public function create()
	{
		$this->data['titlePageTwo'] = 'Postear';

		$modelCategories = new CategoriesModel();
		$this->data['categories'] = $modelCategories->findAll();

		return loadViews("post/create", $this->data);
	} //create

	public function save()
	{
		$modelPost = new PostsModel();
		$request = \Config\Services::request();
		$file = $this->request->getFile('banner');
		$filename = $file->getRandomName();
		if ($file->isValid()) {
			$file->move(ROOTPATH . "public/uploads", $filename);
			$this->data = array(
				'banner' => $filename,
				// 'title' => $request->getPostGet('title'),
				'slug' => url_title($request->getPostGet('title')),
				'create_at' => date('Y-m-d H:i:s'),
				'show_home' => 0,
				'id_user' => 1
			);

			if ($modelPost->save($this->data)) {
				$info['info'] = [
					'type' => 'success',
					'message' => ['Post Creado']
				];
				$this->session->set($info);

				$db = \Config\Database::connect();
				$query = $db->query(
					"SELECT id, slug FROM appCode_udemy.posts p 
				ORDER BY id DESC LIMIT 1"
				);
				$result = $query->getResult();
				$url = $result[0]->slug . '/' . $result[0]->id;

				return redirect()->to($url);
			} else {
				$info['info'] = [
					'type' => 'error',
					'message' => $modelPost->errors()
				];
				$this->session->set($info);
				return redirect()->to('undefined');
			}
		} else {
			$this->data['error'] = 'Archvio no válido';
			dd($this->data, 'error de archivo no valido');
		}

		// return loadViews("uploadPost", $this->data);
	} //save

	public function list($slug, $id)
	{
		$this->data['titlePageTwo'] = 'Post';
		if ($id && $slug) {
			$db = \Config\Database::connect();
			$modelComment = new CommentsModel();
			$this->data['comments'] = $modelComment->where('post_id', $id)->findAll();

			$modelPost = new PostsModel();
			$post = $modelPost->where('id', $id)->first();
			$this->data['post'] = $post;

			$modelCategories = new CategoriesModel();
			$this->data['category'] = $modelCategories->where('id', $post['category'])->first();

			$modelUser = new UsersModel();
			$this->data['user'] = $modelUser->where('id', $post['id_user'])->first();
		} else {
			$info['info'] = [
				'type' => 'error',
				'message' => ['Post No Existe']
			];
			$this->session->set($info);
		}
		// dd($this->data);
		return loadViews('post/list', $this->data);
	} //list

	//--------------------------------------------------------------------

}
