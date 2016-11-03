<?php
namespace Framework;
use View\Asset;
class ControllerAbstract
{
    protected $_config;
    protected $_request;
    protected $_response;
    protected $_session;


    public function __construct(Config $config ,
                                Request $request,
                                Response $response,
                                Session $session)
    {
        $this->_config = $config;
        $this->_request = $request;
        $this->_response = $response;
        $this->_session = $session;
    }

    protected function loadLayout($view, array $dependencies)
    {

        return new $view($dependencies);
    }

}