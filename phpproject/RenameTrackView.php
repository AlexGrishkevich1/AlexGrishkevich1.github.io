<?php
class RenameTrackView {
	public $data;
	function __construct($data) {
		$this->data = $data;
	}
    function getContent() {
        include 'templates/rename.php';
    }
	function getTitle() {
		return 'Переименовать трек';
	}
	function run() {
        include 'templates/layout.php';
    }
}