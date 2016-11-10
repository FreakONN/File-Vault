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
        //#upass = $_POST['password'];
        $umail = $_POST['email'];

        //$stmt = $this->_db->prepare("INSERT INTO users(username,email) VALUES(:uname, :umail)");
        $stmt = $this->_db->prepare("INSERT INTO user(username,email) VALUES(:uname, :umail)");

        $stmt->bindparam(':uname', $uname);
        $stmt->bindparam(':umail', $umail);
        $stmt->execute();
    }

    public function update(){
        $uname = $_POST['uname'];
        $umail = $_POST['umail'];
        $id = $_GET['edit_id'];

        $stmt = $this->_db->prepare("UPDATE user SET username=:uname, email=:uemail WHERE id=:id");
        $stmt->bindparam(':uname', $uname);
        $stmt->bindparam(':uemail', $umail);
        $stmt->bindparam(':id', $id);
        $stmt->execute();
    }

    public function edit(){
        $stmt = $this->_db->prepare("SELECT * FROM user WHERE id=:id");
        $stmt->execute(array(':id' => $_GET['edit_id']));
        $editRow=$stmt->FETCH(PDO::FETCH_ASSOC);
    }

    public function delete(){
        $id = $_GET['delete_id'];
        $stmt = $this->_db->prepare("DELETE FROM user WHERE id=:id");
        $stmt->execute(array(':id' => $id));
        header("Location: index.php");
    }

    public function login($username, $password, $salt = "inchoo")
    {

        /*
        $query = $this->getDatabase()->prepare("SELECT * FROM user WHERE Username = :username");
        $query->bindParam(':username', $username);
        $query->execute();
        */
        $password = $password . $salt;
        $password = sha1($password);

        $query = $this->getDatabase()->prepare("SELECT * FROM user WHERE Username = :username AND Password = :password");
        $query->bindParam(':username', $username);
        $query->bindParam(':password', $password);
        $query->execute();
        $rows = $query->fetch();
        //error_array
        $error_array = null;
/*
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
*/
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
        //$query->bindParam(':confirmed', $confirmed);
        $query->execute();
    }

    public function validateReg($username, $password, $email)
    {
        $error_array = array();
        $query = $this->getDatabase()->prepare("SELECT * FROM User WHERE Username=:username");
        $query2 = $this->getDatabase()->prepare("SELECT * FROM User WHERE Email=:email");
        $query->bindParam(':username', $username);
        $query2->bindParam(':email', $email);
        $query->execute();
        $query2->execute();

        if (empty($username) || empty($password) || empty($email)) {
            $error_array[] = "Neka polja nisu popunjena!";
        }

        if (!$this->whitespaces($username, $email, $password)) {
            $error_array[] = "Whitespace-ovi nisu dopušteni!";
        }

        if ($query->rowCount() > 0) {
            $error_array[] = "Username već postoji!";
        }

        if ($query2->rowCount() > 0) {
            $error_array[] = "E-mail je zauzet!";
        }

        if (strlen($password) < 5 || strlen($password) > 7) {
            $error_array[] = "Lozinka mora biti između 5 i 7 znakova!";
        }

        if (!$this->validateEmail($email)) {
            $error_array[] = "E-mail nije u valjanom formatu!";
        }
        return $error_array;
    }

    public function whitespaces($username, $email = null, $password)
    {
        if (preg_match('/\s/', $username) || preg_match('/\s/', $email) || preg_match('/\s/', $password)) {
            return false;
        } else return true;
    }

    public function validateEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        } else return true;
    }


    public function randomString($length = 32) {
        $str = "";
        $characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
        $max = count($characters)-1;
        for ($i = 0; $i < $length; $i++) {
            $rand = rand(0, $max);
            $str .= $characters[$rand];
        }
        return $str;
    }

    public function verify($value)
    {
        $query = $this->getDatabase()->prepare("SELECT Validate FROM User WHERE Validate=:validate");
        $query2 = $this->getDatabase()->prepare("UPDATE User SET Confirmed='1' WHERE Validate=:validate");
        $query->bindParam(':validate', $value);
        $query2->bindParam(':validate', $value);
        $query->execute();
        if($query->rowCount() == 1)
        {
            $query2->execute();
        }
    }


}