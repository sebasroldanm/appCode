<?php

namespace App\Controllers;
/* use CodeIgniter\Controller; */

use App\Models\UsersModel;

class Dashboard extends BaseController
{
    public function index()
    {
        echo view("includes/header");
        echo view("index");
        echo view("includes/extra");
        echo view("includes/footer");
        /* $model = new UsersModel();
        $id = $model->insert([
            "name" => "Sebastian",
            "username" => "sebasroldanm",
            "password" => "123456",
            "role" => "1"
        ]); */
    }
}
