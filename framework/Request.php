<?php
namespace Framework;

class Request
{
    protected $params;
    static $instance;

    public function __construct()
    {
        //dohvaćanje argumenata u phtml formi
        $this->setParams($_POST);
        $this->setParams($_GET);
    }

    protected function __clone()
    {
    }

    public function setParams($params)
    {
        //var_dump('params'); -- string(6) "params" string(6) "params"
        if (!empty($params))
        {
            $counter = 0;
            foreach ($params as $key => $value)
            {
                $this->params[$key] = $value;
            }
        }
        else
        {
            $arrayKeys = null;
        }
    }

    public function getParams()
    {
        return $this->params;
    }
}
/*
 * za dohvaćanje parametara u tablici login register
    public function getParam($name)
    {
        if(isset($this->params[$name]))
        {
            return $this->params[$name];
        }
        return null;
    }
*/