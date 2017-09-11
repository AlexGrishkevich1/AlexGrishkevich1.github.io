<?php
class MainView {
	public $data;
	function __construct($data) {
		$this->data = $data;
	}
	function getContent() {
		include 'templates/main.php';
	}
	function getTitle() {
		return 'Главная';
	}
    function run() {
        include 'templates/layout.php';
    }
}