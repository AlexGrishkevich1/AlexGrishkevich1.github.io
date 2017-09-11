<?php
define('UPLOADS_PATH', $_SERVER['DOCUMENT_ROOT'].'/1/mvc2/music/');
include('UploadViewData.php');
class UploadModel {
	private $trackFormat = array('mp3', 'wav', 'ogg');
	private $data;
	private $pdo;
	function getData() {
		return $this->data;
	}
	function __construct($pdo) {
		$this->pdo = $pdo;
	}
	function run() {
		$viewData = new UploadViewData;
		$viewData->userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
		$viewData->userLogin = isset($_SESSION['user_login'])? $_SESSION['user_login'] : null;
		$this->data = $viewData;
		if (!isset($_POST['add_track'])) {
			return;
		}
		if (!isset($_FILES['upload_file'])) {
			$viewData->globalError = 'выберите файл';
			return;
		}
		if ($_FILES['upload_file']['error']!==0) {
			$viewData->globalError = 'ошибка при загрузке';
			return;
		}
		$fileInfo = new SplFileInfo($_FILES['upload_file']['name']);
		if (!in_array($fileInfo->getExtension(), $this->trackFormat)) {
			$viewData->globalError = 'неподходящий формат. допустимые форматы: '.implode(',',$this->trackFormat);
			return;
		}
		if (empty($_POST['track_name'])) {
			$viewData->globalError = 'введите название трека';
			return;
		}
	    $writeTrack = $this->pdo-> prepare("insert into music (name, author, format) values (?, ?, ?)");
        $writeTrack->bindParam(1, ($_POST['track_name']));
        $writeTrack->bindParam(2, ($_SESSION['user_id']));
		$format = $fileInfo->getExtension();
		$writeTrack->bindParam(3, $format);
		$writeTrack->execute();
		move_uploaded_file($_FILES["upload_file"]["tmp_name"], UPLOADS_PATH.$this->pdo->lastInsertId().'.'.$format);
		header("location: index.php?c=personal_cabinet&last_upload_track=".$this->pdo->lastInsertId()."&last_format=".$format );
	}
};