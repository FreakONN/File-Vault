<?php
namespace Controller\User\Handle;
use Framework;

class Register extends Framework\ControllerAbstract
{
    public function execute()
    {
        $this->loadLayout("\\View\\User\\Register", [])->output();
    }
}