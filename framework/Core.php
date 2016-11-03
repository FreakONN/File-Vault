<?php
namespace Framework;

class Core
{
    protected $_config;
    protected $_request;
    protected $_response;
    protected $_session;

    public function __construct()
    {
        $this->_config = new Config;
        $this->_request = new Request;
        $this->_response = new Response;
        $this->_session = new Session;

        $this->init();
    }

    public function init()
    {
        $params = $this->_request->getParams();

        $module = $params["module"];
        $task = $params["task"];
        $class = $params["class"];

        //http://filevault.loc/?module=asset&task=handle&class=listing
        $class =  "\\Controller\\" . $module . "\\$task" . "\\$class";

        $controller = new $class($this->_config, $this->_request, $this->_response, $this->_session);
        $controller->execute();

    }
}