<?php
include('UploadModel.php');
include('UploadView.php');
class UploadController {
	function run() {
		if ($_SESSION['user_id'] == null) {
			throw new NotLoggedException();
		}
		$model = new UploadModel(getPdo());
		$model->run();
		$view = new UploadView($model->getData()); // передаю в конструктор отсюда
		$view->run(); 
	}
}