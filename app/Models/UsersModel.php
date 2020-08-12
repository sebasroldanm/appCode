<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = "users";
    protected $primaryKey = "id";

    protected $returnType = "array";
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        "name",
        "email",
        "bio",
        "username",
        "password",
        "role",
        "last_login",
        "deleted",
        "created_at",
        "updated_at",
        "deleted_at"
    ];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules    = [
        'name'  => 'required|alpha_numeric_space|min_length[3]',
        'email' => 'required|valid_email',
        'username' => 'required|is_unique[users.username]',
        'password' => 'required'
    ];
    protected $validationMessages = [
        'name' => [
            'required' => 'El campo de nombre es obligatorio.',
            'alpha_numeric_space' => 'El campo de nombre solo puede contener caracteres alfanuméricos y de espacio.',
            'min_legth' => 'El campo de nombre debe tener al menos 3 caracteres de longitud.'
        ],
        'email' => [
            'required' => 'El campo de correo electónico es obligatorio.',
            'valid_email' => 'El campo de correo electrónico debe contener una dirección de correo electrónico válida.'
        ],
        'username' => [
            'required' => 'El campo de Usuario es obligatorio.',
            'is_unique' => 'El campo de Usuario de usuario debe contener un valor único.'
        ],
        'password' => [
            'required' => 'El campo de Contraseña es obligatorio.'
        ]
    ];
    protected $skipValidation     = false;


    //protected $beforeUpdate = ['dateNowUpdate'];
    /**
     * Guarda la fecha actual en la actulización, no se usa por php 7.4
     */
    protected function dateNowUpdate(array $data)
    {
        $data["data"]["updated_at"] = date("Y-m-d H:i:s");
    }
}
