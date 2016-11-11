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
    //ako korisnik nije logan redirektaj ga na register page
    //ako page nije nađen pošalji mu poruku 404
    public static function redirect($url)
    {
        //$this->_response->redirect("user/account");
        header('Location:'.$url);
        die();
    }

}