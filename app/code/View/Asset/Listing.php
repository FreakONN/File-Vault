<?php
namespace View\Asset;
use Framework;

class Listing extends Framework\ViewAbstract
{

    protected $_name;
    protected $_lastname;

    public function output() {
        $session = $this->_dependencies["session"];
        $name = $session->get("name");
        $this->_name = $name;
        $this->_lastname = "Perić";

        $this->setTemplate("asset/listing.phtml")->render();
    }

}