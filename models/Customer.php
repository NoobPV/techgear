<?php

namespace app\models;

use app\core\Model;

class Customer extends Model
{
    const GENDER_MALE = 1;
    const GENDER_FEMALE = 0;

    public $id;
    public $username;
    public $password;
    public $full_name;
    public $email;
    public $gender;
    public $phone;
    public $address;
    public $role;
    public $created_at;
    public $updated_at;
}
