<?php
include('MainModel.php');
include('MainView.php');
class MainController {
	function run() {
		$model = new MainModel(getPdo());
		$model->run();
		$view = new MainView($model->getData()); // передаю в конструктор отсюда
		$view->run(); 
	}
}