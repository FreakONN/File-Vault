<?php

/*TO-DO: prebaciti upload metodu u add ali nije nužno -- dio abstraktirati u database klasi
        srediti public (insert i update)...provjera na: if(isset($_SESSION['is_logged_in']))
        CRUD operacije i onda srediti upload/add
        odvojiti implemetacije blog posta i uploada
        upload i blog implemetacija koriste istu tablicu -- ODVOJITI u asset table i share table
        srediti unique, autoincrement key (user_id, asset_id)

BUG:
*/

class ShareModel extends Model
{
    //odvojiti u posebnu metodu
	public function Index(){
		$this->query('SELECT * FROM shares ORDER BY create_date DESC');
		$rows = $this->resultSet();
		return $rows;
		//ispisuje sadržaj u tablici
		//print_r($rows);
	}
    public function upload(){
        $file = $_FILES['fileToUpload'];
        $uploadFileName = $file['name'];
        $uploadFileType = $file['type'];
        $uploadFileSize = $file['size'];
        $decision = "no";

        // Sanitize POST
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if($post['upload']){
            move_uploaded_file($file['tmp_name'], TARGET_DIR . DS . $file['name']);
            foreach($post['public'] as $param) //gets the data from the checkbox
            {
                if($param !=null ){ //checks if the checkbox is checked
                    $this->$decision = "yes"; //sets teh value
                }
            }
            $this->query('INSERT INTO shares (title, file_name, file_type, file_size, visibility, /*download_count,*/  user_id) VALUES (:title, :file_name, :file_type, :file_size, :decision, /*:download_count,*/ :user_id)');
            // Insert into MySQL
            $this->bind(':title', $post['title']);
            $this->bind(':file_name', $uploadFileName);
            $this->bind(':file_type', $uploadFileType);
            $this->bind(':file_size', $uploadFileSize);
            //$this->bind(':download_count', $post['download_count']);
            $this->bind(':decision', $post['public']);
            $this->bind(':user_id', 1);	//jer još nismo logirani stavlja se 1 (true)
            $this->execute();
            header('Location: '.ROOT_URL.'shares');
        }
        return;
    }
    public function delete(){
        // Sanitize POST
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if($_POST['delete']){
            $this->query('DELETE FROM shares WHERE id=:id');
            $this->bind(':id', $id);
            $this->bind(':user_id', 1);
            $this->execute();
        }
        return;
    }

    public function getCount(){

    }
}