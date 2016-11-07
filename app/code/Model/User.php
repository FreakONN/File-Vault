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
        //za usera
        //$this->_db = Modcel::getInstance()->();

    }

    public function save(){
        $uname = $_POST['username'];
        $umail = $_POST['email'];

        $stmt = $this->_db->prepare("INSERT INTO tbl_test(username,email) VALUES(:uname, :umail)");

        $stmt->bindparam(':uname', $uname);
        $stmt->bindparam(':umail', $umail);
        $stmt->execute();
    }

    public function update(){
        $uname = $_POST['uname'];
        $umail = $_POST['umail'];
        $id = $_GET['edit_id'];

        $stmt = $this->_db->prepare("UPDATE tbl_test SET username=:uname, email=:uemail WHERE id=:id");
        $stmt->bindparam(':uname', $uname);
        $stmt->bindparam(':uemail', $umail);
        $stmt->bindparam(':id', $id);
        $stmt->execute();
    }

    public function edit(){
        $stmt = $this->_db->prepare("SELECT * FROM tbl_test WHERE id=:id");
        $stmt->execute(array(':id' => $_GET['edit_id']));
        $editRow=$stmt->FETCH(PDO::FETCH_ASSOC);
    }

    public function delete(){
        $id = $_GET['delete_id'];
        $stmt = $this->_db->prepare("DELETE FROM tbl_test WHERE id=:id");
        $stmt->execute(array(':id' => $id));
        header("Location: index.php");
    }
    //<--------AKO HOCES IMATI PRISTUP BAZI U MODELU

}