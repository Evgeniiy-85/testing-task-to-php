<?php

class controller_admin extends Controller {
	
	protected $_do = false;
	
	protected function _model() {
		
		if (isset(Router::$routes[1]) && is_file(APP_DIR . "models/model_admin_" . str_replace("-", "_", Router::$routes[1]) . ".php")) {
			$model_name = "model_admin_" . str_replace("-", "_", Router::$routes[1]);
			include_once(APP_DIR . "models/" . $model_name . ".php");
			$this->model = new $model_name;
		} else {
			$this->model = new model_admin;
		}
		
		return true;
		
	}
	
	protected function _start() {
	
		if ($this->user->status != "admin") {
			Router::redirect("/login/");
		}
		
		if (isset($_GET['do'])) {
			$this->_do = $_GET['do'];
		}
		
		if (isset(Router::$routes[1]) && !empty(Router::$routes[1])) {
			$method = str_replace("-", "_", Router::$routes[1]);
			if (method_exists($this, $method)) {
				$this->$method();
			} else {
				$this->error404();
			}
		} else {
			$this->index();
		}
		
		return true;
	
	}
	
	public function index() {
		
		Router::redirect("/admin/articles/");
	
		return true;
	
	}
	
	public function news() {

		$this->model->news();
		
		switch ($this->_do) {
			
			case "add":
				if (!$this->model->news_add($_POST)) {
					$this->error404();
				}
				$this->content("admin.news.form.tpl");
			break;
			case "edit":
				$this->model->news_item($_GET['id']);
				if (!$this->model->news_edit($_POST)) {
					$this->error404();
				}
				$this->content("admin.news.form.tpl");
			break;
			case "delete":
				if (!$this->model->news_delete($_GET['id'])) {
					$this->error404();
				}
			break;
			case false:
				if (!$this->model->news_list()) {
					$this->error404();
				}
				$this->content("admin.news.list.tpl");
			break;
			
		}
		
		return true;
		
	}
	
	public function articles() {
		
		$this->model->articles();
		
		switch ($this->_do) {
			
			case "add":
				if (!$this->model->articles_add($_POST)) {
					$this->error404();
				}
				$this->content("admin.articles.form.tpl");
			break;
			case "edit":
				$this->model->articles_item($_GET['id']);
				if (!$this->model->articles_edit($_POST)) {
					$this->error404();
				}
				$this->content("admin.articles.form.tpl");
			break;
			case "delete":
				if (!$this->model->articles_delete($_GET['id'])) {
					$this->error404();
				}
			break;
			case false:
				if (!$this->model->articles_list()) {
					$this->error404();
				}
				$this->content("admin.articles.list.tpl");
			break;
			
		}
		
		return true;
		
	}
	
	public function static_pages() {
		
		$this->model->static_pages();
		
		switch ($this->_do) {
			
			case "add":
				if (!$this->model->static_pages_add($_POST)) {
					$this->error404();
				}
				$this->content("admin.static-pages.form.tpl");
			break;
			case "edit":
				if (!$this->model->static_pages_edit((int)$_GET['id'], $_POST)) {
					$this->error404();
				}
				$this->content("admin.static-pages.form.tpl");
			break;
			case "delete":
				if (!$this->model->static_pages_delete((int)$_GET['id'])) {
					$this->error404();
				}
			break;
			case false:
				if (!$this->model->static_pages_list()) {
					$this->error404();
				}
				$this->content("admin.static-pages.list.tpl");
			break;
			
		}
		
		return true;
		
	}
	
	public function menu() {
		
		$this->model->menu($_POST);
		
		$this->content("admin.menu.tpl");
		
		return true;
		
	}
	
	public function products() {
		
		$this->model->products();
		
		switch ($this->_do) {
			
			case "add":
				if (!$this->model->products_add($_POST)) {
					$this->error404();
				}
				$this->content("admin.products.form.tpl");
			break;
			case "edit":
				$this->model->products_item($_GET['id']);
				if (!$this->model->products_edit($_POST)) {
					$this->error404();
				}
				$this->content("admin.products.form.tpl");
			break;
			case "delete":
				if (!$this->model->products_delete($_GET['id'])) {
					$this->error404();
				}
			break;
			case false:
				if (!$this->model->products_list()) {
					$this->error404();
				}
				$this->content("admin.products.list.tpl");
			break;
			
		}
		
		return true;
	}
	
	public function sections() {
		
		$this->model->sections();
		
		switch ($this->_do) {
			
			case "add":
				if (!$this->model->sections_add($_POST)) {
					$this->error404();
				}
				$this->content("admin.sections.form.tpl");
			break;
			case "edit":
				$this->model->sections_item($_GET['id']);
				if (!$this->model->sections_edit($_POST)) {
					$this->error404();
				}
				$this->content("admin.sections.form.tpl");
			break;
			case "delete":
				if (!$this->model->sections_delete($_GET['id'])) {
					$this->error404();
				}
			break;
			case false:
				if (!$this->model->sections_list()) {
					$this->error404();
				}
				$this->content("admin.sections.list.tpl");
			break;
			
		}
		
		return true;
	}
	
	public function options() {
		
		$this->model->options();
		
		switch (Router::$routes[2]) {
			case "basic":
				$this->model->options_basic($_POST);
				$this->content("admin.options.basic.tpl");
			break;
			case "homepage":
				$this->model->options_homepage($_POST);
				$this->content("admin.options.homepage.tpl");
			break;
			default:
				Router::redirect("/admin/options/basic/");
			break;
		}
		
		
		return true;
		
	}
	
}