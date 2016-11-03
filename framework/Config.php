<?php
namespace Framework;

class Config
{
    protected $_iniConfig;

    public function __construct() {
       $this->_iniConfig =  parse_ini_file(dirname(__FILE__)."/../app/etc/config.ini");
    }

    public function getSettings()
    {
        return $this->_iniConfig;
    }

    public function getSetting($key)
    {
        $settings = $this->getSettings();
        return $settings[$key];
    }
}