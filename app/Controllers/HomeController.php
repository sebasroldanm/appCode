<?php

namespace App\Controllers;

use App\Models\CategoriesModel;
use App\Models\NewsletterModel;

class HomeController extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->data['titlePageOne'] = 'WSmith - ';
		$this->data['titlePageTwo'] = 'Home';
    }

	public function index()
	{

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

	public function addNewsLetter()
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

	//--------------------------------------------------------------------

}
