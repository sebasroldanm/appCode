<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CategoriesSeeder extends Seeder
{
	public function run()
	{
		//
		$data = [
            [
                "name" => "Deporte",
                "description" => "Recreación, pasatiempo o ejercicio físico, por lo común al aire libre."
            ],
            [
                "name" => "Cultura",
                "description" => "esde otro punto de vista se puede decir que la cultura es toda la información y habilidades que posee el ser humano. El concepto de cultura es fundamental para las disciplinas que se encargan del estudio de la sociedad, en especial para la antropología y la sociología."
            ],
            [
                "name" => "Hobbie",
                "description" => "Generalmente, el término aficionado o amateur se aplica a todo aquel que realiza las actividades de su afición sin un carácter de ejercicio profesional."
            ]
        ];

		foreach ($data as $value) {
			$this->db->table('categories')->insert($value);
		}
	}
}
