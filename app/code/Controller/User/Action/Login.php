<?php
namespace Controller\User\Action;
use Framework;
//setamo action
//http://localhost/File-vault/user/handle/login
class Login extends Framework\ControllerAbstract
{
    public function execute()
    {
        $userModel = new User();
        $this->userModel = $userModel->login();

    }
}