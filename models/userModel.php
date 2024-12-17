<?php

use Libs\Model;

class UserModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function save()
    {
        // $query = $this->prepare("INSERT INTO users (name) VALUES (:name)");
        // $query->bindValue(":name", "", PDO::PARAM_STR);
    }
}