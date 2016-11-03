<?php
namespace View\Asset;
use Framework;

class Listing extends Framework\ViewAbstract
{

    protected $_name;
    protected $_lastname;

    public function output() {
        $this->_name = "Pero";
        $this->_lastname = "Perić";

        $this->setTemplate("asset/listing.phtml")->render();
    }

}