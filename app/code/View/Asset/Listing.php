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
    public $baseUrl;

    public function output()
    {
        $session = $this->_dependencies["session"];
        $this->baseUrl = $this->_dependencies["config"]->getSetting('base_url');
        $name = $session->get("name");

        $this->_name = $name;
        $this->_lastname = "Perić";

        //odkomentirati kada se sredi baza
       // $assetModel = new Asset();
       // $this->_assetList = $assetModel->getList();

        $params = $this->_dependencies["request"]->getParams();
        $userId = $params["userid"];
       // var_dump($test);exit;

        $assetModel = new Asset();
        $this->_assetList = $assetModel->getList($userId);
 Framework\Debug::dump($this->_assetList);
        $this->setTemplate("asset/listing.phtml")->render();
    }
}