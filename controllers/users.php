<?php
/*
kada imamo kontroler moramo imati i model -- kada želimo neki resurs poput post-a za blog post kreiramo post.php i njegovu pripadajuću klasu Post zatim u modelu Post.php i njegovu pripadajuću klasu te zatim folder post u view-u i sve njegove view-ove unutra
*/
class Users extends Controller{
	protected function register(){
		$viewmodel = new UserModel();	//UserModel klasa je definirana u models folderu
		$this->returnView($viewmodel->register(), true);
	}

	protected function login(){
		$viewmodel = new UserModel();	//UserModel klasa je definirana u models folderu
		$this->returnView($viewmodel->login(), true);
	}

	protected function logout(){
		unset($_SESSION['is_logged_in']);	//definirano u modelu
		unset($_SESSION['user_data']);		//definirani u modelu
		session_destroy();					//ubija sve session varijable
		// Redirect
		header('Location: '.ROOT_URL);
	}
}