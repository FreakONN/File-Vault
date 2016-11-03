<?php
namespace Framework;

class ModelResourceAbstract
{
    public function getParams()
    {
        /*
         * Don't forget, because $_REQUEST is a different variable than $_GET and $_POST, it is treated as such in PHP
         * -- modifying $_GET or $_POST elements at runtime will not affect the ellements in $_REQUEST, nor vice versa.
         */
        return $_REQUEST;
    }
}