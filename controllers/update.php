<?php

class Update extends Controller{
    protected function update(){
        if(!isset($_SESSION['is_logged_in'])){
            header('Location: '.ROOT_URL.'shares');
        }
        $viewmodel = new ShareModel();
        $this->returnView($viewmodel->update(), true); //true je za fullview
    }
}