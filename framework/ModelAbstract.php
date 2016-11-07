<?php
namespace Framework;

class ModelAbstract
{
    public function get()
    {
        $stmt = $this->_db->prepare("SELECT * FROM tbl_test WHERE id=:id");
        $stmt->execute(array(':id' => $_GET['edit_id']));
        return $stmt->FETCH(PDO::FETCH_ASSOC);

    }
}