<?php

namespace App\Controllers;
/* use CodeIgniter\Controller; */

use App\Models\UsersModel;

class Dashboard extends BaseController
{
    public function index()
    {
        echo loadViews("index");
    }
}
