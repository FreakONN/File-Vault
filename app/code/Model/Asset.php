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

    public function getList()
    {

        //http://www.codingcage.com/2015/03/how-to-use-php-data-object-pdo-tutorial.html (SIMPLE)
        // advanced: https://phpdelusions.net/pdo#dml

        $stmt = $this->_db->prepare("SELECT * FROM tbl_test WHERE id=:id");
        $stmt->execute(array(':id' => $_GET['edit_id']));
        return $stmt->FETCH(PDO::FETCH_ASSOC);

    }
//"SELECT FROM dasdas W"."$dadsa". jsdas <---ne to

}