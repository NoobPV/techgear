<?php

namespace app\models;

use app\core\Model;

class Category extends Model
{
    public $id;
    public $category_name;
    public $description;
    public $image;
    public $created_at;
    public $updated_at;
}
