<?php
namespace Controller\Asset\Action;
use Framework;
use Model\Asset;

class Delete extends Framework\ControllerAbstract
{
    public function execute()
    {
        $assetModel = new Asset();
        $assetModel->delete();
    }
}
