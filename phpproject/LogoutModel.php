<?php
class LogoutModel {
	function run() {
		session_start();
		$_SESSION = array();
	}
};