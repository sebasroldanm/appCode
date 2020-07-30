<?php

namespace App\Controllers;
/* use CodeIgniter\Controller; */

use App\Models\PostsModel;
use App\Models\UsersModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $model = new PostsModel();
        $model->insert([
            "banner" => "http://lorempixel.com/640/480",
            "title" => "quidem",
            "intro" => "nihil laboriosam eos",
            "content" => "Minima repudiandae corrupti quisquam ab officiis.",
            "category" => "1",
            "tags" => "et non sapiente",
            "created_at" => date("Y-m-d"),
            "created_by" => "1"
        ]);

        return loadViews("index");
    }

    public function uploadPost()
    {
        helper(["url", "form"]);
        $validation = \Config\Services::validation();

        $validation->setRule("title", "title", "required");

        if ($_POST) {
            if (!$validation->withRequest($this->request)->run()) {
                //form validation error
                $errors = $validation->getErrors();
                print_r($errors);
            } else {
                //form validation succes
                echo "Enviado exitosamente!";
            }
            $file = $this->request->getFile("banner");
            $filename = $file->getRandomName();
            if ($file->isValid()) {
                $file->move(WRITEPATH . "uploads", $filename);
            } else {
                echo "Archivo no válido";
            }
        }
        return view("uploadPost");
    }
}
