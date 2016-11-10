<?php
namespace Controller\Asset\Action;
use Framework;

class Create extends Framework\ControllerAbstract
{
    public function execute()
    {
        var_dump($this->_request->getParams());
        $assetModel = new Asset();
        $assetModel->create();
        //redirect na neku drugu adresu
        $this->_response->redirect("asset/account");
    }
}