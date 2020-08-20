<?php

namespace App\Controllers;

use App\Models\CategoriesModel;
use App\Models\PostsModel;

class CategoryController extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->data['titlePageOne'] = 'WSmith - ';
		$this->data['titlePageTwo'] = 'Categorias';
    }

	public function index()
	{
        dd('Index');
    }
    
    public function list($id)
    {
        $this->data['titlePageOne'] = 'Categoria - ';

        $categoryModel = new CategoriesModel();
        $postModel = new PostsModel();
        $this->data['category'] = $categoryModel->where("id", $id)->first();
        $this->data['posts']  = $postModel->where("category", $id)->findAll();

        $this->data['titlePageTwo'] = $this->data['category']['name'];

        return loadViews('Category/list', $this->data);
    }

	//--------------------------------------------------------------------

}
