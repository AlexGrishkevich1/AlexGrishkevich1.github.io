<?php 
class DeleteTrackModel {
	function __construct($pdo) {
		$this->pdo = $pdo;
	}
	function run() {
		session_start();
		$deleteTrack = $this->pdo ->prepare('DELETE FROM `music` WHERE id_music=?');
		$deleteTrack->bindParam(1, ($_POST['deleted_track_id']));
		$deleteTrack->execute();
		$params = array('delete_name' => $_POST['deleted_track_name']);
		header("location: index.php?c=personal_cabinet&".http_build_query($params));
	}
};