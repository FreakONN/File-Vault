<?php
class ShareModel extends Model
{
	public function Index(){
		$this->query('SELECT * FROM shares ORDER BY create_date DESC');
		$rows = $this->resultSet();
		return $rows;
		//ispisuje sadržaj u tablici
		//print_r($rows);
	}

    public function add(){
        // Sanitize POST
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if($post['submit']){
            if($post['title'] == '' || $post['body'] == '' || $post['link'] == ''){
                Messages::setMsg('Please Fill In All Fields', 'error');
                return;
            }
            // Insert into MySQL
            $this->query('INSERT INTO shares (title, body, link, user_id) VALUES(:title, :body, :link, :user_id)');
            $this->bind(':title', $post['title']);
            $this->bind(':body', $post['body']);
            $this->bind(':link', $post['link']);
            $this->bind(':user_id', 1);	//jer još nismo logirani stavlja se 1 (true)
            $this->execute();
            // Verify
            if($this->lastInsertId()){
                // Redirect
                header('Location: '.ROOT_URL.'shares'); //ovo je url - ne smije biti razmaka
            }
        }
        return;
    }

    public function upload(){
        $file = $_FILES['fileToUpload'];
        $uploadFileName = $file['name'];
        $uploadFileType = $file['type'];
        $uploadFileSize = $file['size'];
        var_dump($_FILES);
        // Sanitize POST
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if($post['upload']){
            move_uploaded_file($file['tmp_name'], TARGET_DIR . DS . $file['name']);
            // Insert into MySQL
            $this->query('INSERT INTO shares (file_name, file_type, file_size) VALUES (:file_name, :file_type, :file_size)');
            $this->bind(':file_name', $uploadFileName);
            $this->bind(':file_type', $uploadFileType);
            $this->bind(':file_size', $uploadFileSize);
            $this->bind(':user_id', 1);	//jer još nismo logirani stavlja se 1 (true)
            $this->execute();
            header('Location: '.ROOT_URL.'shares');
        }
        return;
    }
}