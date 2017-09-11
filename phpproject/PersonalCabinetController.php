<?php
include('PersonalCabinetModel.php');
include('PersonalCabinetView.php');
class PersonalCabinetController {
	function run() {
		if ($_SESSION['user_id'] == null) {
			throw new NotLoggedException();
		}
		$model = new PersonalCabinetModel(getPdo());
		$model->run();
		$view = new PersonalCabinetView($model->getData()); // передаю в конструктор отсюда
		$view->run(); 
	}
}