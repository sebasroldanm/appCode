<?php

namespace App\Models;

use CodeIgniter\Model;

class NewsletterModel extends Model
{
    protected $table = "newsletter";
    protected $primaryKey = "id";

    protected $returnType = "array";
    protected $useSoftDeletes = true;

    protected $allowedFields = ["email", "add_at"];

    protected $useTimestamps = false;

    protected $validationRules      = [
        'email' => 'required|valid_email|is_unique[newsletter.email]'
    ];

    protected $validationMessages = [
        'email' => [
            'required' => 'El campo de correo electónico es obligatorio.',
            'valid_email' => 'El campo de correo electrónico debe contener una dirección de correo electrónico válida.',
            'is_unique' => 'Este correo ya esta suscrito.'
        ]
    ];
}
