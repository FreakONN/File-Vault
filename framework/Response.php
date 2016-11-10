<?php
namespace Framework;

class Response
{
    public function __construct()
    {
        //redirect za kontroler
        //ako imamo na login/register page-u neki poziv preko kontrolera ga redirectamo

    }
    public static function redirect($url)
    {
        header('Location:'.$url);
        die();
    }

}