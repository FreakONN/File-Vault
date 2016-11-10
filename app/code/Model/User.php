<?php
namespace Model;
use Framework;

class User extends Framework\ModelAbstract
{
    //AKO HOCES IMATI PRISTUP BAZI U MODELU ----->
    protected $_db;

    public function __construct()
    {
        $this->_db = Framework\Database::getInstance()->getConnection();
        //za usera
        //$this->_db = Modcel::getInstance()->();

    }
//<--------AKO HOCES IMATI PRISTUP BAZI U MODELU

    public function save(){
        $uname = $_POST['username'];
        //$umail = $_POST['email'];
        $umail = $_POST['password'];

        //$stmt = $this->_db->prepare("INSERT INTO users(username,email) VALUES(:uname, :umail)");
        $stmt = $this->_db->prepare("INSERT INTO users(username,email) VALUES(:uname, :umail)");

        $stmt->bindparam(':uname', $uname);
        $stmt->bindparam(':umail', $umail);
        $stmt->execute();
    }

    public function update(){
        $uname = $_POST['uname'];
        $umail = $_POST['umail'];
        $id = $_GET['edit_id'];

        $stmt = $this->_db->prepare("UPDATE users SET username=:uname, email=:uemail WHERE id=:id");
        $stmt->bindparam(':uname', $uname);
        $stmt->bindparam(':uemail', $umail);
        $stmt->bindparam(':id', $id);
        $stmt->execute();
    }

    public function edit(){
        $stmt = $this->_db->prepare("SELECT * FROM users WHERE id=:id");
        $stmt->execute(array(':id' => $_GET['edit_id']));
        $editRow=$stmt->FETCH(PDO::FETCH_ASSOC);
    }

    public function delete(){
        $id = $_GET['delete_id'];
        $stmt = $this->_db->prepare("DELETE FROM users WHERE id=:id");
        $stmt->execute(array(':id' => $id));
        header("Location: index.php");
    }
/*
    public function login($username, $password, $salt = "inchoo")
    {
        $password = $password . $salt;
        $password = sha1($password);
        $query = $this->getDatabase()->prepare("SELECT * FROM user WHERE Username = :username");
        $query2 = $this->getDatabase()->prepare("SELECT * FROM user WHERE Username = :username AND Password = :password");
        $query->bindParam(':username', $username);
        $query->execute();
        $query2->bindParam(':username', $username);
        $query2->bindParam(':password', $password);
        $query2->execute();
        $rows = $query2->fetch();
        $error_array = null;

        if (empty($username) || empty($password)) {
            $error_array[] = "Neka polja su prazna!";
        }

        if ($query->rowCount() != 1) {
            $error_array[] = "Korisnik ne postoji u bazi!";
        }

        if ($query2->rowCount() != 1) {
            $error_array[] = "Lozinka nije valjana!";
        }

        if($rows['Confirmed'] == 0)
        {
            $error_array[] = "Korisnik nije potvrđen!";
        }

        return $error_array;

    }
    public function register($username, $password, $email, $salt = "inchoo")
    {
        $password = $password . $salt;
        $password = sha1($password);
        $validate = $this->randomString();
        $query = $this->getDatabase()->prepare("INSERT INTO User(Username,Password,Email,Validate,Confirmed) VALUES(:username,:password,:email,:validate,:confirmed)");
        $query->bindParam(':username', $username);
        $query->bindParam(':password', $password);
        $query->bindParam(':email', $email);
        $query->bindParam(':validate', $validate);
        $query->bindParam(':confirmed', $confirmed);
        $query->execute();
    }
*/


}