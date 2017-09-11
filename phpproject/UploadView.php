<?php
class UploadView {
	public $data;
	function __construct($data) {
		$this->data = $data;
	}
	function getContent() {
		include 'templates/upload.php';
	}
	function getTitle() {
		return 'Загрузить трек';
	}
    function run() {
        include 'templates/layout.php';
    }
}