<?php
include('RenameTrackModel.php');
include('RenameTrackView.php');
class RenameTrackController {
	function run() {
		if ($_SESSION['user_id'] == null) {
			throw new NotLoggedException();
		}
		$model = new RenameTrackModel(getPdo());
		$model->run();
		$view = new RenameTrackView($model->getData()); // передаю в конструктор отсюда
		$view->run(); 
	}
}