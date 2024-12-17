<?php

namespace Models;

use Libs\Model;
use PDO;
use PDOException;

class LoginModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getUsers()
    {
        try {
            $query = $this->query("SELECT * FROM users");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log('Login::getUsers()->'. $e->getMessage());
            return false;
        }
    }
}