<?php
namespace Controller\Asset\Handle;
use Framework;

class Listing extends Framework\ControllerAbstract
{
    public function execute()
    {
        $this->loadLayout("\\View\\Asset\\Listing", array($this->_config))->output();
    }

}