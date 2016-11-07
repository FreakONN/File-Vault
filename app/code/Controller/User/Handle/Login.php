<?php
namespace Controller\User\Handle;
use Framework;
//setamo template
class Login extends Framework\ControllerAbstract
{
    public function execute()
    {
        $this->loadLayout("\\View\\User\\Login", [])->output();
    }
}