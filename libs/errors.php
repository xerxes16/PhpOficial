<?php

namespace Libs;

class Errors
{
    // Success_controller_method
    const ERROR_LOGIN_AUTH          = 'aiuhuihds876s78d78';
    const ERROR_LOGIN_AUTH_EMPTY    = '15ag8t7td7s87sg878';
    const ERROR_LOGIN_AUTH_DATA     = 'a8tb899d96s9nn9ssd';

    public $list = [];

    public function __construct()
    {
        $this->list = [
            Errors::ERROR_LOGIN_AUTH => "Login Failed",
            Errors::ERROR_LOGIN_AUTH_EMPTY => "The parameters must not be empty",
            Errors::ERROR_LOGIN_AUTH_DATA => "Email or Password is incorrect",
        ];
    }

    public function get($hash)
    {
        return $this->list[$hash];
    }

    public function exists($key)
    {
        return array_key_exists($key, $this->list);
    }
}