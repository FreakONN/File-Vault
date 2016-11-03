<?php
namespace Framework;

class Debug {
    static function dump($var) {
        echo "<pre>";
        var_dump($var);
        echo "</pre>";
    }
}