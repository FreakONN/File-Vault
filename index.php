<?php
spl_autoload_register(function ($className) {

    $classPathArray = explode("\\", $className);

    if(in_array("Framework", $classPathArray)) {

        include "framework/". $classPathArray[1] . ".php";

    } else {
        $classPath = implode("/", $classPathArray);
        include "app/code/". $classPath . ".php";
    }



});

new \Framework\Core;
