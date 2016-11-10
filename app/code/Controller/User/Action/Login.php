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

        //napraviti metodu u loginu userModel
        $login = $userModel->login(); // trebala bi vratiti true ili false

        if ($login['status'] == 1) {
            $this->_session->set("is_user_logged_in", true);
            $this->_response->redirect("asset/listing");

        } else {
            $this->_session->addMessage($login["error"]); //dodas tu metodu u session
            $this->_response->redirect("user/account");
        }
    }
}

