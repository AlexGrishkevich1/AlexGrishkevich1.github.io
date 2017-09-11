<?php
include('LoginViewData.php');
class LoginModel {
	private $data;
	private $pdo;
	function getData() {
		return $this->data;
	}
	function __construct($pdo) {
		$this->pdo = $pdo;
	}
	function run() {
		if (@$_SESSION['userId'] !== null) {
			header('location: index.php?c=main');
			return;
		}
		$viewData = new LoginViewData;
		$this->data = $viewData; 
		
		
		if(isset($_POST["postlogin"])){
			if(empty($_POST['email']) || empty($_POST['password'])) {
				$viewData->warning = 'Заполните все поля';
				return;
			}
			$issetUser = $this->pdo-> prepare("SELECT id, login, password FROM user WHERE email = :email");//подготовленный запрос на сравнение с существующим
			$issetUser->execute(array(':email'=>$_POST['email']));
			$row = $issetUser->fetch(PDO::FETCH_ASSOC);
			if (!isset($row['id']) || !password_verify($_POST['password'], $row['password'])) {
				$viewData->warning='Неверные логин или пароль';
				return;
			}
			$_SESSION['user_id']= $row['id'];
			$_SESSION['user_login']= $row['login'];
			header("location: index.php?c=main" );
			
		}
		
	}
}