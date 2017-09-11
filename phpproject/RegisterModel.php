<?php
include('RegisterViewData.php');
class RegisterModel {
	private $data;
	private $pdo;
	function getData() {
		return $this->data;
	}
	function __construct($pdo) {
		$this->pdo = $pdo;
	}
	function hasConstraintViolation($message, $field) {
		return substr($message, 0, strlen('Duplicate entry')) == 'Duplicate entry' && 
				substr($message, -strlen("for key '$field'") ) == "for key '$field'";
	}
	function runValidation($viewData) {
		
		$result = true;
		if (empty($_POST['email'])) {
			$viewData->emailValidationError='поле email обязательно для ввода';
			$result = false;
		}
		if (strlen($_POST['email'] > 45)) {
			$viewData->emailValidationError='максимальный размер поля email 45 символов';
			$result = false;
		}
		if (strpos($_POST['email'],'@') === false) {
			$viewData->emailValidationError='поле email должно содержать символ @';
			$result = false;
		}
		if (empty($_POST['login'])) {
			$viewData->loginValidationError='поле login обязательно для ввода';
			$result = false;
		}
		if (strlen($_POST['login'] > 45)) {
			$viewData->loginValidationError='максимальный размер поля login 45 символов';
			$result = false;
		}
		if (empty($_POST['name'])) {
			$viewData->nameValidationError='поле name обязательно для ввода';
			$result = false;
		}
		if (strlen($_POST['name'] > 45)) {
			$viewData->nameValidationError='максимальный размер поля name 45 символов';
			$result = false;
		}
		if (strlen($_POST['password']) < 6) {
			$viewData->passwordValidationError='введите не менее 6 символов';
			$result = false;
		}
		return $result;
	}
	function run() {
		$viewData = new RegisterViewData;
		if (@$_SESSION['userId'] !== null) {
			header('location: index.php?c=main');
			return;
		}
		
		$this->data = $viewData;
		
		if(isset($_POST['register'])){
			$viewData->login = $_POST['login'];
			$viewData->email = $_POST['email'];
			$viewData->name = $_POST['name'];
			if ($this->runValidation($viewData)) {
				try {
					$writeUser = $this->pdo-> prepare("insert into user (email, login, password, name) values (?,?,?,?)");
					$writeUser->bindParam(1, $_POST['email']);
					$writeUser->bindParam(2, $this->data->login);
					$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
					if ($password === false) {
						throw new Exception;
					}
					$writeUser->bindParam(3, $password);
					$writeUser->bindParam(4, $_POST['name']);
					$writeUser->execute();
					$_SESSION['user_id']= $this->pdo->lastInsertId();
					$_SESSION['user_login']= $this->data->login;
				} catch (PDOException $e) {
					$message = $e->errorInfo[2];
					if ($this->hasConstraintViolation($message, 'email')) { 
						$viewData->warning = 'Пользователь с таким email уже существует';
					} else if ($this->hasConstraintViolation($message, 'login')) {
						$viewData->warning = 'Пользователь с таким login уже существует';
					}
					return;
				}
				header('location: index.php?c=main');
			} else { 
				$viewData->warning = 'есть ошибки валидации';
			}
		}
	}
};