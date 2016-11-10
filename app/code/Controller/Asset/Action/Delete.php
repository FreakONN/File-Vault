<?php
namespace Controller\Asset\Action;
use Framework;
use Model\Asset;

class Delete extends Framework\ControllerAbstract
{
    public function execute()
    {
        if($this->_session->isUserLogedIn()) {
            $assetModel = new Asset();
            $assetModel->delete();
        } else {
            $this->_response->redirect("user/login");
        }
    }
}
