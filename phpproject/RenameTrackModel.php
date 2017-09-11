<?php
include('RenameTrackViewData.php');
class RenameTrackModel {
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
		$viewData = new RenameTrackViewData;
		$this->data = $viewData;
		$viewData->userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
		$viewData->userLogin = isset($_SESSION['user_login'])? $_SESSION['user_login'] : null;
		$readTracksName = $this->pdo->prepare("SELECT m.name FROM music m WHERE m.id_music = ?");
		$readTracksName->bindParam(1, ($_GET['track_id']));
		$readTracksName->execute();
		$viewData->renamedTrackName = $readTracksName->fetch(PDO::FETCH_ASSOC); // вывод имени трека в подсказку

		$renameTrack = $this->pdo->prepare("UPDATE music SET name = ? WHERE id_music=?");
		$renameTrack->bindParam(1, ($_POST['name_of_rename_track']));
		$renameTrack->bindParam(2, ($_GET['track_id'])); 
		$params = array('renamed_track'=> $this->data->renamedTrackName['name'], 'new_name'=>$_POST['name_of_rename_track']);
		if (isset($_POST['track_rename'])) {
			$renameTrack->execute();
			if ($this->data->renamedTrackName['name'] == $_POST['name_of_rename_track']) {
				header("location: index.php?c=personal_cabinet");
			} else {
				header("location: index.php?c=personal_cabinet&".http_build_query($params)."");
			}
		}
	}
};