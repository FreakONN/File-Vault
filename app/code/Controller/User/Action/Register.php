<?php
namespace Controller\User\Action;
use Framework;

class Register extends Framework\ControllerAbstract
{
    public function execute()
    {
        $userModel = new User();
        $this->userModel = $userModel->save();

    }
}