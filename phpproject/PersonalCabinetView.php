<?php
class PersonalCabinetView {
	public $data;
	function __construct($data) {
		$this->data = $data;
	}
	function getContent() {
		include 'templates/personal_cabinet.php';
	}
	function getTitle() {
		return 'Личный кабинет';
	}
    function run() {
        include 'templates/layout.php';
    }
}