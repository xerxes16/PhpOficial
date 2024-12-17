<?php

namespace Controllers;

use Libs\Controller;

class Errors extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->view->render('errors/index');
    }
}