<?php
namespace Controller\User\Handle;
use Framework;
//loadamo setani templat
class Account extends Framework\ControllerAbstract
{
    public function execute()
    {
        $dependencies = array("config"=>$this->_config);
        $this->loadLayout("\\View\\User\\Account", $dependencies)->output();
    }


}