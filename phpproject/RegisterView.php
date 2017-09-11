<?php
class RegisterView {
	public $data;
	function __construct($data) {
		$this->data = $data;
	}
    function getContent() {
        include 'templates/register.php';
    }
	function getTitle() {
		return 'Регистрация';
	}
	function run() {
        include 'templates/layout.php';
    }
}