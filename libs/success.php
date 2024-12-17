<?php

namespace Libs;

class Success
{
    // Success_controller_method
    const SUCCESS_LOGIN_AUTH = '1234';

    public $list = [];

    public function __construct()
    {
        $this->list = [
            Success::SUCCESS_LOGIN_AUTH => "Login Successfully"
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