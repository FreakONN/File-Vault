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
        if (!empty($params)) {
            $counter = 0;
            foreach ($params as $key) {
                $counter++;
                if ($counter % 2 == 0) {
                    $arrayKeys[$params[$counter - 2]] = $key;
                } else {
                    $arrayKeys[$key] = null;
                }
            }
        } else {
            $arrayKeys = null;
        }
        $this->params = $arrayKeys;
    }

    public function getParams($name)
    {
        if (isset($this->params[$name]))
        {
            return $this->params[$name];
            //return $this->params;
        }
        //return $this->params;
        return null;
    }
}