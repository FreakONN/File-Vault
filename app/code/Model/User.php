<?php
namespace Model;
use Framework;

class Asset extends Framework\ModelAbstract
{
    //AKO HOCES IMATI PRISTUP BAZI U MODELU ----->
    protected $_db;

    public function __construct()
    {
        $this->_db = Framework\Database::getInstance()->getConnection();
    }

    //<--------AKO HOCES IMATI PRISTUP BAZI U MODELU

}