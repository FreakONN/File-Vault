<?php
namespace Controller\Asset\Handle;
use Framework;

class Listing extends Framework\ControllerAbstract
{
    public function execute()
    {
        $this->_session->set("name", "Pero");
        $dependencies = array("config"=>$this->_config, "session" => $this->_session, "request" => $this->_request);

        $this->loadLayout("\\View\\Asset\\Listing", $dependencies)->output();
    }
}