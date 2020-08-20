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
        $newsLetterModel = new NewsletterModel();
        $request = \Config\Services::request();
        $email = $request->getPostGet('email');
		if (isset($email)) {
            $this->data = array(
                'email' => $email,
                'add_at' => date('Y-m-d')
            );
            if($newsLetterModel->save($this->data)){
                echo "Ahora haces parte de nosostros, te enviaremosnuestros ultimos posts";
            }
            else{
                foreach ($newsLetterModel->errors() as $value) {
                    echo $value;
                }
            }
        }
	}

	//--------------------------------------------------------------------

}
