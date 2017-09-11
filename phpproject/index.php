<?php 

define('DATABASE_CONNECTION_STRING', "mysql:host=localhost;dbname=author_music;charset=utf8");
define('DATABASE_LOGIN','root');
define('DATABASE_PASSWORD','');

define('TRACKS_PER_PAGE', 5);
define('COMMAND_PARAMETER', 'c');
include('NotFoundException.php');
include('NotLoggedException.php');
include('Controller.php');

function getPdo() {
	$pdo = new PDO (DATABASE_CONNECTION_STRING, DATABASE_LOGIN, DATABASE_PASSWORD);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	return $pdo;
}
$controller = new Controller;
$controller->run();
