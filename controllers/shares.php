<?php

class Shares extends Controller{
	protected function Index(){
		$viewmodel = new ShareModel();
		$this->returnView($viewmodel->Index(), true); //true je za fullview
	}
    protected function upload(){
        if(!isset($_SESSION['is_logged_in'])){
            header('Location: '.ROOT_URL.'shares');
        }
        $viewmodel = new ShareModel();
        $this->returnView($viewmodel->upload(), true); //true je za fullview
    }

    protected function delete(){
        if(!isset($_SESSION['is_logged_in'])){
            header('Location: '.ROOT_URL.'shares');
        }
        $viewmodel = new ShareModel();
        $this->returnView($viewmodel->delete(), true); //true je za fullview
    }
}