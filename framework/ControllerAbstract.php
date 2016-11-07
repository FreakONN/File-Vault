<?php
namespace Framework;
use View\Asset;
class ControllerAbstract
{
    protected $_config;
    protected $_request;
    protected $_response;
    protected $_session;

    //Type declarations iliti type hinting

    public function __construct(Config $config,
                                Request $request,
                                Response $response,
                                Session $session)
    {
        $this->_config = $config;
        $this->_request = $request;
        $this->_response = $response;
        $this->_session = $session;
    }

    //objasniti
    protected function loadLayout($view, array $dependencies)
    {
        //novi array objekt
        return new $view($dependencies);
    }

    /*
        <?php
            $a = array('one', 'two', 'three');
            $ao = new ArrayObject($a);

            foreach ($ao as $element) {
                echo $element . ' '; // one two three
            }

            $b = array('four', 'five', 'six');
            $ao->exchangeArray($b); // returns null

            foreach ($ao as $element) {
                echo $element . ' '; // four five six
            }
        ?>
     */
}