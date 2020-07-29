<?php

namespace App\Controllers;
/* use CodeIgniter\Controller; */

use App\Models\UsersModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $this->loadViews("index");
    }

    public function loadViews($view = null)
    {
        echo view("includes/header");
        echo view($view);
        echo view("includes/extra");
        echo view("includes/footer");
    }
}
