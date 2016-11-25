<?php
//nemoram je instancirati ali naši kontroleri će se extendati iz nje
abstract class Controller{
	protected $request;
	protected $action;

	public function __construct($action, $request){
		$this->action = $action;
		$this->request = $request;
	}

	public function executeAction(){
	//vraća što god ta proslijeđena akcija je
	//Any scalar variable, array element or object property with a string representation can be included via this syntax.	
		return $this->{$this->action}();
	/*REF:
		1) http://stackoverflow.com/questions/1147937/php-curly-brace-syntax-for-member-variable
		2) http://php.net/manual/en/language.types.string.php#language.types.string.parsing.complex*/
	}

	protected function returnView($viewmodel, $fullview){
		//we want assign view to something
		//if we have register method in some folder we want to assign it to register view
		$view = 'views/'. get_class($this). '/' . $this->action. '.php';
		//file mora biti nazvan kao action
		if($fullview){ 
		//ako je fullview onda ćemo load main layout file
		//we want main layout that wraps around our view
		//in that layout we can have html tags or just simply our main page
			require('views/main.php'); //ovo je definirano ovim: 'views/' .
		} else {
			require($view);
			//get_class($this) . '/' //ovo je definirano ovim: 'views/' .
		}
	}
}