<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = "users";
    protected $primaryKey = "id";

    protected $returnType = "array";
    protected $useSoftDeletes = true;

    protected $allowedFields = ["name", "email", "bio", "username", "password", "role", "last_login"];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [
        'name'  => 'required|alpha_numeric_space|min_length[3]',
        'email' => 'required|valid_email',
        'username' => 'required|is_unique[users.username]',
        'password' => 'required'
    ];
    protected $validationMessages = [
        'email' => [
            'is_unique' => 'El username debe de ser unico'
        ]
    ];
    protected $skipValidation     = false;
}
