<?php
namespace Framework;

class ModelAbstract
{
    public function getDatabase()
    {
        return Database::getInstance();
    }
}