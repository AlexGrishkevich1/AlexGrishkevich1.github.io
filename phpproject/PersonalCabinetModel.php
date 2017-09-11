<?php
include('PersonalCabinetViewData.php');
class PersonalCabinetModel {
	private $data;
	private $pdo;
	function getData() {
		return $this->data;
	}
	function __construct($pdo) {
		$this->pdo = $pdo;
	}
	function run() {
		if (isset($_GET['page_number']) && $_GET['page_number'] < 1) {
			throw new NotFoundException();
		};
		$viewData = new PersonalCabinetViewData;
		$viewData->userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
		$viewData->userLogin = isset($_SESSION['user_login'])? $_SESSION['user_login'] : null;
		$viewData->pageNumber = isset($_GET['page_number']) ? intval($_GET['page_number'])  : 1;
		$viewData->deleteName = isset($_GET['delete_name']) ? $_GET['delete_name'] : null;
		$viewData->renamedTrack = isset($_GET['renamed_track']) ? $_GET['renamed_track'] : null;
		$viewData->newName = isset($_GET['new_name']) ? $_GET['new_name'] : null;
		$this->data = $viewData; //1
		
		
		$readTrackName = $this->pdo-> prepare("select name from music where id_music = ?");
		$readTrackName -> bindParam(1, $_GET['last_upload_track']);
		$readTrackName->execute();
		$trackName = $readTrackName->fetch(PDO::FETCH_ASSOC);
		$selectUserTracks = $this->pdo->prepare("SELECT m.name, m.id_music, m.format FROM music m WHERE m.author = ? ORDER by m.id_music DESC LIMIT ? OFFSET ?");
		$selectUserTracks->bindParam(1, $_SESSION['user_id'], PDO::PARAM_INT);
		$trackPerPage = TRACKS_PER_PAGE; 
		$selectUserTracks->bindParam(2, $trackPerPage, PDO::PARAM_INT );
		 
		$offset = ($viewData->pageNumber -1)* $trackPerPage;
		$selectUserTracks->bindParam(3, $offset, PDO::PARAM_INT); 
		$selectUserTracks->execute();
		$viewData->tracks = $selectUserTracks->fetchAll(PDO::FETCH_ASSOC);
		$selectCount = $this->pdo->prepare("SELECT count(*) AS cnt FROM music m WHERE m.author = ?");
		$selectCount->bindParam(1, $_SESSION['user_id'], PDO::PARAM_INT);
		$selectCount->execute();
		$viewData->trackCount = $selectCount->fetch(PDO::FETCH_ASSOC)['cnt'];
		$viewData->ceilPage = ceil(($this->data->trackCount)/($trackPerPage));
		$this->data = $viewData; //2
	}
}