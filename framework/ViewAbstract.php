<?php
namespace Framework;

class ViewAbstract
{
    protected $_template = '';
    protected $_dependencies = array();

    public function __construct($dependencies)
    {
        $this->_dependencies = $dependencies;
    }

    public function setTemplate($template)
    {
        //ispraviti
        $this->_template = dirname(__FILE__)."/../public/theme/chosemyname/templates/" . $template;
        return $this;
    }

    public function render()
    {
        require_once $this->_template;
    }
}