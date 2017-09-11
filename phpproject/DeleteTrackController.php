<?php 
include('DeleteTrackModel.php');
class DeleteTrackController {
	function run() {
		if ($_SESSION['user_id'] == null) {
			throw new NotLoggedException();
		}
		$model = new DeleteTrackModel(getPdo());
		$model -> run();
		
	}
};