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
        if(!empty($params))
        {
            $counter = 0;
            foreach ($params as $key)
            {
                $counter++;
                if($counter % 2 == 0)
                {
                    $arrayKeys[$params[$counter - 2]] = $key;
                }
                else
                {
                    $arrayKeys[$key] = null;
                }
            }
        }
        else
        {
            $arrayKeys = null;
        }
        $this->params = $arrayKeys;
    }

    public function getParams()
    {
            return $this->params;
    }


    /*
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
    */
}
