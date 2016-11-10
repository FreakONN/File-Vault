<?php
namespace Controller\Asset\Action;
use Framework;

class Update extends Framework\ControllerAbstract
{
    public function execute()
    {
        if($this->_session->isUserLogedIn()) {
            $assetModel = new Asset();
            $assetModel->update();
        } else {
            $this->_response->redirect("user/login");
        }
    }
}