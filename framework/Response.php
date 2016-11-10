<?php
namespace Framework;

class Response
{
    public function __construct()
    {
        //redirect za kontroler
        //ako imamo na login/register page-u neki poziv preko kontrolera ga redirectamo

    }
    //pokupiti iz session-a
    //ako korisnik nije logan redirektaj ga u tri pizde vražje
    public static function redirect($url)
    {
        header('Location:'.$url);
        die();
    }

}