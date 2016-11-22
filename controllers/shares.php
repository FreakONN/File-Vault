<?php

class Shares extends Controller{
	protected function Index(){
		$viewmodel = new ShareModel();
		$this->returnView($viewmodel->Index(), true); //true je za fullview
	}

	protected function add(){
		if(!isset($_SESSION['is_logged_in'])){
			header('Location: '.ROOT_URL.'shares');
		}
		$viewmodel = new ShareModel();
		$this->returnView($viewmodel->add(), true); //true je za fullview
	}

	//pomaknuti kada se napravi forma
    protected function upload(){
        if(!isset($_SESSION['is_logged_in'])){
            header('Location: '.ROOT_URL.'shares');
        }
        $viewmodel = new ShareModel();
        $this->returnView($viewmodel->upload(), true); //true je za fullview
    }
}