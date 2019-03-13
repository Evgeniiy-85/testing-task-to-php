<?php

class Users {

	/**
	 * @var string
	 */
	public $status = "guest";

	/**
	 * @var int
	 */
	public $id = 0;

	/**
	 * @var string
	 */
	public $login;

	/**
	 * @var string
	 */
	public $password;

	/**
	 * @var string
	 */
	public $reg_time;

	/**
	 * @var int
	 */
	public $del = 0;
	
	
	private $_errors = array();
	
	
	public function __construct() {
	
		return true;
	
	}
	
	public function auth() {
	
		$user_id = 0;
		
		if (isset($_SESSION['user_id'])) {
			$user_id = (int)$_SESSION['user_id'];
		}
		
		if (!$this->set($user_id)) {
			return false;
		}
		
		return true;
		
	}
	
	public function set($user_id) {
		
		if (!$user = pn_users_get($user_id)) {
			return false;
		}
		
		foreach ($user as $_ukey => $_uval) {
			$this->$_ukey = $_uval;
		}
		
		return true;
		
	}
	
	public function login($data) {
	
		$data['login'] = trim($data['login']);
	
		if (empty($data['login'])) {
			$this->error("Логин не указан");
			return false;
		}
		if (empty($data['password'])) {
			$this->error("Пароль не указан");
			return false;
		}
		
		$user = pn_users_get($data['login'], "login");
	
		if (!$user) {
			$this->error("Пользователь не найден");
			return false;
		}
		
		if (pn_hash($data['password']) != $user['password']) {
			$this->error("Пароль указан некорректно");
			return false;
		}
		
		$_SESSION['user_id'] = $user['id'];
		
		return $this->auth();
	
	}
	
	public function logout() {
	
		return session_destroy();
	
	}
	
	public function error($error, $key = false) {
	
		if (!$key) {
			$this->_errors[] = $error;
		} else {
			$this->_errors[$key] = $error;
		}
		
		return true;
	
	}
	
	public function get_errors() {
	
		return (!empty($this->_errors)) ? $this->_errors : false;
	
	}

}