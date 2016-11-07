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
        //zašto je instancirana klasa unutar konstruktora
        //na stcku je stavljen pod bad codding practice
        $this->_config = new Config;
        $this->_request = new Request;
        $this->_response = new Response;
        $this->_session = new Session;

        $this->init();
    }

    public function init()
    {
        $params = $this->_request->getParams();
        $url = $this->_parseUrl();

        $module = $url[0];
        $task = $url[1];
        $class = $url[2];

        //http://filevault.loc/?module=asset&task=handle&class=listing
        $class =  "\\Controller\\" . $module . "\\$task" . "\\$class";

        $controller = new $class($this->_config, $this->_request, $this->_response, $this->_session);
        $controller->execute();

    }

    private function _parseUrl()
    {
        if (isset($_GET['url'])) {
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }
}