<?php
namespace View\User;
use Framework;
//http://localhost/File-vault/user/handle/register
class Register extends Framework\ViewAbstract
{
    public function output()
    {
        $this->setTemplate("user/register.phtml")->render();
    }
}