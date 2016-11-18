<?php
/*
kada imamo kontroler moramo imati i model -- kada želimo neki resurs poput post-a za blog post kreiramo post.php i njegovu pripadajuću klasu Post zatim u modelu Post.php i njegovu pripadajuću klasu te zatim folder post u view-u i sve njegove view-ove unutra
*/
class Home extends Controller{
	protected function Index(){
		$viewmodel = new HomeModel();
		$this->returnView($viewmodel->Index(), true);
	}
}