<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$view_layout = view('layout/header').view('layout/body');
		return $view_layout;
	}

	//--------------------------------------------------------------------

}
