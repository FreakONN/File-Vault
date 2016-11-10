<?php
namespace Framework;

class ViewAbstract
{
    protected $_template = '';
    protected $_dependencies = array();
    protected $_message;

    public function __construct($dependencies)
    {
        $this->_dependencies = $dependencies;
    }

    public function setTemplate($template)
    {
        //ispraviti
        $this->_template = dirname(__FILE__)."/../public/theme/FileVault/templates/" . $template;
        return $this;
    }


    public function getMessages($message)
    {
        //return 
    }

    public function render()
    {
        require_once $this->_template;
    }
}