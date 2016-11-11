<?php
namespace Controller\Asset\Action;
use Framework;

class Create extends Framework\ControllerAbstract
{
    public function execute()
    {
        if($this->_session->isUserLoggedIn()){
            //var_dump($this->_request->getParams());
            $assetModel = new Asset();
            $assetModel->create();
        }else{
            $this->_response->redirect("user/account");
        }
    }
}