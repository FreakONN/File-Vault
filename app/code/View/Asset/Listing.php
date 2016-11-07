<?php
namespace View\Asset;
use Framework;
use Model\Asset;
use Framework\Session;

class Listing extends Framework\ViewAbstract
{

    protected $_name;
    protected $_lastname;
    protected $_assetList;

    public function output()
    {
        $session = $this->_dependencies["session"];
        $name = $session->get("name");

        $this->_name = $name;
        $this->_lastname = "Perić";

        $assetModel = new Asset();
        $this->_assetList = $assetModel->getList();

        $this->setTemplate("asset/listing.phtml")->render();
    }
}