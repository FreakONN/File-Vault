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

    //kupimo podatke iz tablice "list"
    /*public function getList()
    {
        $stmt = $this->_db->prepare("SELECT * FROM list WHERE id=:AssetId");
        $stmt->execute(array(':id' => $_GET['edit_id'])); //edit_id
        return $stmt->FETCH(PDO::FETCH_ASSOC);
    }*/

    public function getList()
    {
        $stmt = $this->_db->prepare("SELECT * FROM list WHERE id=:AssetId");
        $stmt->execute(array(':id' => $_GET['edit_id'])); //edit_id
        return $stmt->FETCH(PDO::FETCH_ASSOC);
    }

    /*public function getAssetList($userId, $query, $rows)
    {
        $query = $this->getDatabase()->prepare("SELECT * FROM list WHERE id = :userid LIMIT $this->_session);
        $query->bindParam(':userid', $userId);
        $query->execute();
        $rows = $query->fetch();
        return $rows['meta_type'];
    }*/
/*
    public function getSize()
    {
        #target_file =
        $stmt = $this->_db->prepare("SELECT * FROM users WHERE id=:UserId");
        $stmt->execute(array(':id' => $_GET['edit'])); //edit_id
        $editRow=$stmt->FETCH(PDO::FETCH_ASSOC);
    }
*/
    public function getFileType()
    {

    }

    public function getFileName()
    {

    }

    public function createDir()
    {

    }
}