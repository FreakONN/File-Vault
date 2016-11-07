<?php
namespace View\User;
use Framework;

class Login extends Framework\ViewAbstract
{
    public function output()
    {
        $this->setTemplate("user/login.phtml")->render();
    }
}