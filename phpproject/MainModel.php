<?php 
include('MainViewData.php');
class MainModel {
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
			throw new NotFoundException;
		};
		$viewData = new MainViewData;
		$viewData->userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
		$viewData->userLogin = isset($_SESSION['user_login'])? $_SESSION['user_login'] : null;
		$viewData->searchQuery = isset($_GET['q']) ? $_GET['q'] : null;
		$searchQueryAll= "%".$viewData->searchQuery."%";
		$viewData->pageNumber = isset($_GET['page_number']) ? intval($_GET['page_number'])  : 1; // рома
		$this->data = $viewData;
		
	    $selectAllTracks = $this->pdo->prepare("SELECT m.name, m.id_music, m.format FROM music m WHERE (? IS NULL OR m.name LIKE ?) ORDER by m.id_music DESC LIMIT ? OFFSET ?");
		$searchQueryAll === NULL;
		$selectAllTracks->bindParam(1, $searchQueryAll);
		$selectAllTracks->bindParam(2, $searchQueryAll);
		$trackPerPage = TRACKS_PER_PAGE;
        $selectAllTracks->bindParam(3, $trackPerPage, PDO::PARAM_INT );
        
        $offset = ($viewData->pageNumber -1)* $trackPerPage;
        $selectAllTracks->bindParam(4, $offset, PDO::PARAM_INT); 
        $selectAllTracks->execute();
        $viewData->tracks = $selectAllTracks->fetchAll(PDO::FETCH_ASSOC);
		
		$selectCount = $this->pdo->prepare("SELECT count(*) AS cnt FROM music m WHERE(? IS NULL OR m.name LIKE ?) ");
        $selectCount->bindParam(1, $searchQueryAll);
		$selectCount->bindParam(2, $searchQueryAll);
        $selectCount->execute();
		$viewData->trackCount = $selectCount->fetch(PDO::FETCH_ASSOC)['cnt'];
		$viewData->ceilPage = ceil(($viewData->trackCount)/($trackPerPage));
       
        $viewData->preferParamsNext = array('page_number' => $viewData->pageNumber + 1, 'q' => $viewData->searchQuery);
		$viewData->preferParamsPrevious = array('page_number' => $viewData->pageNumber - 1, 'q' => $viewData->searchQuery);
		$this->data = $viewData;
		
	}
}