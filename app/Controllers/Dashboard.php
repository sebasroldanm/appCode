<?php

namespace App\Controllers;
/* use CodeIgniter\Controller; */

use App\Models\PostsModel;
use App\Models\UsersModel;
use App\Models\CategoriesModel;
use App\Models\NewsletterModel;

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
        /**
         * Cargar categorias
         */
        $model = new CategoriesModel();
        $data['categories'] = $model->findAll();

        $postModel = new PostsModel();

        helper(["url", "form"]);
        $validation = \Config\Services::validation();

        $validation->setRules(
            [
                "title" => "required",
                "intro" => "required",
                "content" => "required|min_length[10]",
                "category" => "required"
            ],
            [
                "title" => [
                    "required" => "El titulo es requerido"
                ],
                "intro" => [
                    "required" => "El intro es requerido"
                ],
                "content" => [
                    "required" => "El contenido es requerido",
                    "min_length" => "El contenido debe tener almenos 10 caracteres"
                ],
                "category" => [
                    "required" => "La categoria es requerida"
                ]
            ]
        );

        if ($_POST) {
            if (!$validation->withRequest($this->request)->run()) {
                //form validation error
                $errors = $validation->getErrors();
                $data['error'] = true;
                dd($errors);
            } else {
                $file = $this->request->getFile("banner");
                $filename = $file->getRandomName();
                if ($file->isValid()) {
                    $file->move(ROOTPATH . "public/uploads", $filename);
                    $_POST['banner'] = $filename;
                    $_POST['slug'] = url_title($_POST['title']);
                    $_POST['created_at'] = date('Y-m-d');

                    $postModel->insert($_POST);
                } else {
                    echo "Archivo no válido";
                }
            }

            /* $postModel->insert($_POST); */
        }
        return loadViews("uploadPost", $data);
    }

    public function add_newsletter()
    {
        if (isset($_POST['email'])) {
            $newsLetterModel = new NewsletterModel();
            $_POST['add_at'] = date('Y-m-d');
            $emails = $newsLetterModel->where("email", $_POST['email'])->findAll();

            if ($emails) {
                echo "Email ya existe";
            } else {
                $id = $newsLetterModel->insert($_POST);
                echo "Bienvenido a la suscripción de información";
            }
        } else {
            echo "Error";
        }
    }

    public function post($slug = null, $id = null)
    {
        if ($slug && $id) {
            $postModel = new PostsModel();
            $posts = $postModel->where("id", $id)->findAll();
            $data['post'] = $posts;            
            $categoryModel = new CategoriesModel();
            $data['categories'] = $categoryModel->where("id", $posts[0]['category'])->findAll();
            return loadViews("post", $data);
        }
    }
}
