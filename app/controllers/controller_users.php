<?php

class controller_users extends Controller {

	protected function _start() {
	
		if ($this->ajax) {
			return true;
		}
		
		if (Router::$routes[0] == "login") {
			$this->login();
		} else if (Router::$routes[0] == "logout") {
			$this->logout();
		} else if (empty(Router::$routes[1])) {
			$this->index();
		}
		
		return true;
	
	}
	
	public function index() {
	
		if ($this->user->status == "admin") {
			
			Router::redirect("/admin/");
			
		} else {
		
			$this->error404();
			
		}
		
		return true;
		
	}
	
	public function login() {
		
		if ($this->user->status != "guest") {
			$this->error404();
		}
		
		$this->model->login();
		
		$this->content("users.login.tpl");
		
		return true;
		
	}
	
	public function logout() {
		
		$this->user->logout();
		
		Router::redirect("/");
		
		return true;
		
	}
	
	public function ajax_login() {
	
		if ($this->user->status != "guest") {
			return false;
		}
		
		usleep(500000);
		
		$ans = array("status" => "fail", "errors" => array());
	
		if (!$this->user->login($_POST)) {
		
			$ans['errors'] = array_values($this->user->get_errors());
			
		} else {
		
			$ans['status'] = "success";
			if (isset($_SESSION['redirect_uri_part']) && !empty($_SESSION['redirect_uri_part'])) {
				$ans['redirect'] = "/admin/" . $_SESSION['redirect_uri_part'];
			}
			$this->model->alert_message("Привет, " . $this->user->login . "!");
			
		}
		
		return json_encode($ans);
		
	}
	
}