<?php
include('LogoutModel.php');
class LogoutController {
	function run() {
		$model = new LogoutModel;
		$model -> run();
		header("location: index.php?c=main" );
	}
};