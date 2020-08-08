<?php

namespace App\Models;

use CodeIgniter\Model;

class PostsModel extends Model
{
    protected $table = "posts";
    protected $primaryKey = "id";

    protected $returnType = "array";
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        "banner",
        "title",
        "slug",
        "intro",
        "content",
        "category",
        "tags",
        "show_home",
        "id_user",
        "created_at",
        "created_by"
    ];
}
