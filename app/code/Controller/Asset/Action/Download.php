<?php
namespace Controller\Asset\Action;
use Framework;

class Download extends Framework\ControllerAbstract
{
    public function execute()
    {
        if($this->_session->isUserLogedIn()) {
            $assetModel = new Asset();
            $assetModel->download();
        } else {
            $this->_response->redirect("user/login");
        }
    }
}