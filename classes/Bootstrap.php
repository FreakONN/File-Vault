<?php
//http://localhost/php.dev/MVC/users/action
class Bootstrap{
	private $controller;
	private $action;
	private $request;
	//class is taking on a request so in Boostrap it receives it in a form of $_GET superglobal

	public function __construct($request){
		//formating request based on url
		//assigning request to the one that comes in
		$this->request = $request;
		//if there is no controller->method(action) or we are in root directory
		if($this->request['controller'] == ""){ //$_GET stavlja u array
		//if we are in root load home
			$this->controller = 'home';
		} else {
		//kontroler će biti postavljen tamo gdje se nalazi 
			$this->controller = $this->request['controller'];
		}
		if($this->request['action'] == ""){
			$this->action = 'index';
		} else {
			$this->action = $this->request['action'];
		}
		//provjera gdje se nalazimo na url-u tj. kontroleru/actionu
		//echo $this->controller;
	}
	//checking what controller we want
	public function createController(){
		// Check Class
		if(class_exists($this->controller)){
			$parents = class_parents($this->controller);
			// Check Extend
			if(in_array("Controller", $parents)){
				if(method_exists($this->controller, $this->action)){
					return new $this->controller($this->action, $this->request);
				} else {
					// Method Does Not Exist
					echo '<h1>Method does not exist</h1>';
					return;
				}
			} else {
				// Base Controller Does Not Exist
				echo '<h1>Base controller not found</h1>';
				return;
			}
		} else {
			// Controller Class Does Not Exist
			echo '<h1>Controller class does not exist</h1>';
			return;
		}
	}
}