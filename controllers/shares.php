<?php
/*
kada imamo kontroler moramo imati i model -- kada želimo neki resurs poput post-a za blog post
 kreiramo post.php i njegovu pripadajuću klasu Post zatim u modelu Post.php i njegovu pripadajuću
 klasu te zatim folder post u view-u i sve njegove view-ove unutra
*/
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
}