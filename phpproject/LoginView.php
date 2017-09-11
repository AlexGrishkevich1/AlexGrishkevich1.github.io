<?php
class LoginView {
	public $data;
	function __construct($data) {
		$this->data = $data;
	}
    function getContent() {
        include 'templates/login.php';
    }
	function getTitle() {
		return 'Авторизация';
	}
	function run() {
        include 'templates/layout.php';
    }
}