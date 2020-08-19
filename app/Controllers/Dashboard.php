<?php

namespace App\Controllers;
/* use CodeIgniter\Controller; */

use App\Models\PostsModel;
use App\Models\UsersModel;
use App\Models\CategoriesModel;
use App\Models\CommentsModel;
use App\Models\NewsletterModel;

class Dashboard extends BaseController
{
    public function __construct()
	{
		helper('form');
		$this->data['titlePageOne'] = 'WSmith - ';
		$this->data['titlePageTwo'] = 'Home';
    }
    
    public function index()
    {
        /* $model = new PostsModel();
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
 */

        $db = \Config\Database::connect();
        $query = $db->query(
            "SELECT p.*, c.id AS idCategory, c.name AS nameCategory, u.name, u.username 
            FROM posts p 
            INNER JOIN categories c 
            ON p.category  = c.id
            INNER JOIN users u 
            ON p.id_user = u.id 
            ORDER BY p.created_at DESC"
        );
        $result = $query->getResult();
        $this->data['lastPost'] = $result;

        return loadViews("index", $this->data);
    }

    public function uploadPost()
    {
        $this->data['titlePageTwo'] = 'Postear';
        /**
         * Cargar categorias
         */
        $model = new CategoriesModel();
        $this->data['categories'] = $model->findAll();

        $postModel = new PostsModel();

        
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
                $this->data['error'] = $errors;
                dd($errors);
            } else {
                $file = $this->request->getFile("banner");
                $filename = $file->getRandomName();
                if ($file->isValid()) {
                    $file->move(ROOTPATH . "public/uploads", $filename);
                    $_POST['banner'] = $filename;
                    $_POST['slug'] = url_title($_POST['title']);
                    $_POST['created_at'] = date('Y-m-d');
                    $_POST['show_home'] = 0;
                    $_POST['id_user'] = 1;

                    // dd($_POST);

                    $postModel->insert($_POST);
                    $this->data['succes'] = "Su post se ha agregado correctamente";
                    // unset($_POST);
                    // header('Location:' . base_url() . '/dashboard/uploadPost');
                } else {
                    $this->data['error'] = "Archivo no válido";
                }
            }

            /* $postModel->insert($_POST); */
        }
        return loadViews("uploadPost", $this->data);
    }

    public function category($id = null)
    {
        $this->data['titlePageTwo'] = 'Categorias';
        $categoryModel = new CategoriesModel();
        $postModel = new PostsModel();
        $this->data['category'] = $categoryModel->where("id", $id)->findAll();
        $this->data['posts']  = $postModel->where("category", $id)->findAll();

        // dd($data['posts']);

        return loadViews("category", $this->data);
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
        $this->data['titlePageTwo'] = 'Post';
        if ($slug && $id) {

            $db = \Config\Database::connect();
            $commentsModel = new CommentsModel();
            $this->data['comments'] = $commentsModel->where("post_id", $id)->findAll();
            // dd($data);

            if ($_POST) {

                helper(["url", "form"]);

                $validation = \Config\Services::validation();

                $validation->setRules(
                    [
                        "cName" => "required",
                        "cEmail" => "required",
                        "cMessage" => "required|min_length[20]"
                    ],
                    [
                        "cName" => [
                            "required" => "El nombre es requerido"
                        ],
                        "cEmail" => [
                            "required" => "El email es requerido"
                        ],
                        "cMessage" => [
                            "required" => "El comentario es requerido",
                            "min_length" => "El comentario debe tener mínimo 20 caracteres"
                        ]
                    ]
                );

                if (!$validation->withRequest($this->request)->run()) {
                    echo "error!!!";
                    $this->data["error"] = "true";
                } else {
                    $arrayComment = [
                        "post_id" => $id,
                        "date" => date('Y-m-d'),
                        "name" => $_POST['cName'],
                        "email" => $_POST['cEmail'],
                        "comment" => $_POST['cMessage']
                    ];

                    $commentsModel->insert($arrayComment);

                    $this->data['succes'] = "Su comentario ha sido guardado";
                }
            }

            $postModel = new PostsModel();
            $posts = $postModel->where("id", $id)->findAll();
            $this->data['post'] = $posts;
            $categoryModel = new CategoriesModel();
            $this->data['categories'] = $categoryModel->where("id", $posts[0]['category'])->findAll();
            $userModel = new UsersModel();
            $this->data['user'] = $userModel->where("id", $posts[0]['id_user'])->first();

            $query = $db->query(
                "UPDATE posts SET show_home = show_home + 1 WHERE id  = $id"
            );



            return loadViews("post", $this->data);
        }
    }

    public function search()
    {
        $postModel = new PostsModel();
        $request = \Config\Services::request();
        $keyword = $request->getPostGet('keywords');
        $db = \Config\Database::connect();
        $query = $db->query(
            "SELECT * FROM appCode_udemy.posts p WHERE p.title LIKE '%$keyword%'"
        );
        $result = $query->getResult();
        $this->data['result'] = $result;
        $this->data['keyword'] = $keyword;
// dd($this->data);
        return loadViews("result", $this->data);
    }
}
