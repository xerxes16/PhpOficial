<?php

namespace  Libs;

use Libs\View;

class Controller
{
    public $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function redirect($url, $messages = [])
    {
        $data = [];
        $params = "";

        foreach ($messages as $key => $value) {
            $data[] = "$key = $value";
        }

        $params = join('&', $data);

        if($params != "")
            $params = "?$params";

        header("Location: ".URL."/$url$params");
        exit;
    }

    public function existPOST($params)
    {
        foreach ($params as $param) {
            if(!isset($_POST[$param]))
                return false;
        }
        return true;
    }

    public function existGET($params)
    {
        foreach ($params as $param) {
            if(!isset($_GET[$param]))
                return false;
        }
        return true;
    }

    public function response($data)
    {
        echo json_encode($data);
        exit();
    }
}