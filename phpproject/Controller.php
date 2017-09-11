<?php
include('ViewData.php');
include('MainController.php');
include('RenameTrackController.php');
include('PersonalCabinetController.php');
include('RegisterController.php');
include('LoginController.php');
include('UploadController.php');
include('LogoutController.php');
include('DeleteTrackController.php');

class Controller {
	function run() {
		session_start();
		try {
			$controller = $this->getController($this->getCommand());
			$controller->run();
		} catch (NotFoundException $ex) {
			http_response_code(404);
			include('templates/404.php');
		} catch (NotLoggedException $ex) {
			header('location: index.php?c=login');
			return;
		} catch (Exception $ex) {
			http_response_code(500);
			include('templates/500.php');
		}
	}
	private function getCommand() {
		$command = @$_REQUEST[COMMAND_PARAMETER];
		if ($command === null) {
			$command = 'main';
		}
		return $command;
	}
	private function getController($command) {
		if ($command === 'main') {
			return new MainController;
		}
		if ($command === 'rename') {
			return new RenameTrackController;
		}
		if ($command === 'personal_cabinet') {
			return new PersonalCabinetController;
		}
		if ($command === 'register') {
			return new RegisterController;
		}
		if ($command === 'login') {
			return new LoginController;
		}
		if ($command === 'upload') {
			return new UploadController;
		}
		if ($command === 'logout') {
			return new LogoutController;
		}
		if ($command === 'delete') {
			return new DeleteTrackController;
		}
		throw new NotFoundException();
	}
}
