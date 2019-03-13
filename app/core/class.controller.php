<?php

class Controller {

	/**
	 * @var Smarty
	 */
	public $view;

	/**
	 * @var Model|object
	 */
	public $model;

	/**
	 * @var Users
	 */
	public $user;

	/**
	 * @var bool
	 */
	public $ajax = false;

	/**
	 * @var bool
	 */
	public $display = true;
	
	
	public function __construct() {
		
		define("SMARTY_DIR", LIB_DIR . "smarty/");

		require_once(SMARTY_DIR . "Smarty.class.php");

		$smarty_compile_dir = APP_DIR . "cache/smarty/";

		$this->view = new Smarty;

		if (!is_dir($smarty_compile_dir)) {
			mkdir($smarty_compile_dir, 0666);
		}

		$this->view->setTemplateDir(APP_DIR . "views/");
		$this->view->setCompileDir(APP_DIR . "cache/smarty/");
		$this->view->setCacheDir(APP_DIR . "cache/");

		$this->view->escape_html = true;
		
		if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == "XMLHttpRequest") {
			$this->ajax = true;
		}
		
		$this->user = new Users;
		
		$this->user->auth();
		
		if (method_exists($this, "_model")) {
			$this->_model();
		} else {
			$model_classname = str_replace("controller_", "model_", get_class($this));
			
			if (preg_match("/^model_/", $model_classname) && class_exists($model_classname)) {
				$this->model = new $model_classname;
			} else {
				$this->model = new Model;
			}
		}
		
		if ($this->model) {
			$this->model->user = $this->user;
			$this->model->view = $this->view;
		}
		
		$this->view->assign("user", $this->user);
		$this->view->assign("routes", Router::$routes);
		
		if (method_exists($this, "init")) {
			$this->init();
		}
		if ($this->model && method_exists($this->model, "init")) {
			$this->model->init();
		}
		
		if (method_exists($this, "_start")) {
			$this->_start();
		}
		
		return true;
		
	}
	
	public function static_page($slug) {
	
		if (!$this->model->static_page($slug)) {
			$this->error404();
		}
		
		$this->content("static-page.tpl");
		
		return true;
		
	}
	
	public function content($tpl = false) {
	
		$this->view->assign($this->model->tpl);
		$this->view->assign("user", $this->user);
		$this->view->assign("routes", Router::$routes);
		
		if ($tpl) {
			$this->model->tpl['content'] = $this->view->fetch($tpl);
		}
		
		return true;
	
	}
	
	public function error404() {
	
		$this->model->error404();
	
		$this->content("404.tpl");
		
		die;

	}
	
	public function __destruct() {
	
		if ($this->ajax) {
			return true;
		}
		
		$this->view->assign($this->model->tpl);
		$this->view->assign("user", $this->user);
		$this->view->assign("routes", Router::$routes);
		
		if ($this->display) {
			$this->view->display("overall.tpl");
		}
		
		return true;
	
	}

}