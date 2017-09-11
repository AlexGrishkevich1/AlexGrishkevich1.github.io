<?php
include('LoginModel.php');
include('LoginView.php');
class LoginController {
	function run() {
		$model = new LoginModel(getPdo());
		$model->run();
		$view = new LoginView($model->getData()); // передаю в конструктор отсюда
		$view->run(); 
	}
}