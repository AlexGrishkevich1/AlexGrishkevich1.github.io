<?php
include('RegisterModel.php');
include('RegisterView.php');
class RegisterController {
	function run() {
		$model = new RegisterModel(getPdo());
		$model->run();
		$view = new RegisterView($model->getData()); // передаю в конструктор отсюда
		$view->run(); 
		
	}
}