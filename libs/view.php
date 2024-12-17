<?php

namespace Libs;

use Libs\Errors;
use Libs\Success;

class View
{
    public $d;

    public function render($name, $data = [])
    {
        $this->d = $data;
        $this->handleMessages();    
        require_once "views/$name.php";
        exit;
    }

    public function handleMessages()
    {
        if (isset($_GET['success']) && isset($_GET['success'])) {
            #Nothing
        } elseif (isset($_GET['success'])) {
            $this->handleSuccess();
        } elseif (isset($_GET['error'])) {
            $this->handleError();
        }
    }

    public function handleSuccess()
    {
        if (isset($_GET['success'])) {
            $hash = $_GET['success'];
            $success = new Success();

            if ($success->exists($hash)) {
                $this->d['success'] = $success->get($hash);
            } else {
                $this->d['success'] = null;
            }
        }
    }

    public function handleError()
    {
        if (isset($_GET['error'])) {
            $hash = $_GET['error'];
            $success = new Errors();

            if ($success->exists($hash)) {
                $this->d['error'] = $success->get($hash);
            } else {
                $this->d['error'] = null;
            }
        }
    }

    public function showMessages()
    {
        $this->showSuccess();
        $this->showError();
    }

    public function showSuccess()
    {
        if (array_key_exists('success', $this->d)) {
            echo "<div>{$this->d['success']}</div>";
        }
    }

    public function showError()
    {
        if (array_key_exists('error', $this->d)) {
            echo "<div>{$this->d['error']}</div>";
        }
    }
}