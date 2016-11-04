<?php
namespace Controller\Asset\Handle;
use Framework;

class Pero extends Framework\ControllerAbstract
{
    public function execute()
    {
        $this->_session->set("name", "Pero");
        $this->loadLayout("\\View\\Asset\\Listing", array("config"=>$this->_config, "session" => $this->_session))->output();
    }

}