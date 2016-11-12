<?php
namespace Model;
use Framework;
//http://www.codingcage.com/2015/03/how-to-use-php-data-object-pdo-tutorial.html (SIMPLE)
// advanced: https://phpdelusions.net/pdo#dml
class Asset extends Framework\ModelAbstract
{
    //AKO HOCES IMATI PRISTUP BAZI U MODELU ----->
    protected $_db;

    public function __construct()
    {
        $this->_db = Framework\Database::getInstance()->getConnection();
    }
    //<--------AKO HOCES IMATI PRISTUP BAZI U MODELU

    //dohvati userovu listu asseta
    public function getList($userId)
    {
        $stmt = $this->_db->prepare("SELECT * FROM users WHERE UserId = :userid");
        $stmt->bindParam(':userid', $userId);
        $stmt->execute();
        return $stmt->FETCH(\PDO::FETCH_ASSOC);
    }

    /*
    public function getList($userId)
    {
        $stmt = $this->getDatabase()->prepare("SELECT * FROM Assets WHERE UserId = :userid");
        $stmt->bindParam(':userid', $userId);
        $stmt->execute();
        $rows = $stmt->fetch();
        return $rows['mime-type'];//return $rows['public'];
    }
    */
}