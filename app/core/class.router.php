<?php

class Router {

	/**
	 * @var array
	 */
	static public $routes = array();


	public function __construct() {
	
		$uri_array = explode("/", $_SERVER['REQUEST_URI']);
	
		if (empty($uri_array)) {
			return true;
		}
		
		array_pop($uri_array);
		
		foreach ($uri_array as $level) {
		
			$level = urldecode($level);
			
			if (empty($level)) {
				continue;
			}
			
			if (preg_match("/^[-\w]+$/i", $level)) {
				self::$routes[] = $level;
			} else {
				self::redirect("/");
			}
			
		}
		
		return true;
	
	}
	
	public function start() {
	
		$controller_path = APP_DIR . "controllers/";
		$model_path = APP_DIR . "models/";
		
		$static_page = false;
		$controller = null;
		
		if (isset(self::$routes[0]) && !empty(self::$routes[0])) {
			if (self::$routes[0] == "login" || self::$routes[0] == "logout") {
				$controller_name = "controller_users";
				$model_name = "model_users";
			} else {
				if (pn_section_get_by_slug(self::$routes[0])) {
					$controller_name = "controller_products";
					$model_name = "model_products";
				} else {
					$controller_name = "controller_" . self::$routes[0];
					$model_name = "model_" . self::$routes[0];
				}
			}
		} else {
			$controller_name = "controller_index";
			$model_name = "model_index";
		}
		
		$controller_file = strtolower($controller_name) . ".php";
		$model_file = strtolower($model_name) . ".php";
		
		if (file_exists($model_path . $model_file)) {
	
			include_once($model_path . $model_file);
			
		}
		
		if (file_exists($controller_path . $controller_file)) {
			
			include_once($controller_path . $controller_file);
			
			$controller = new $controller_name;
			
		}
		
		if (empty($controller)) {
			$controller = new Controller();
			if (isset(self::$routes[0]) && !empty(self::$routes[0])) {
				$static_page = true;
			}
		}
		
		if ($static_page) {
			$controller->static_page(self::$routes[0]);
		}
		
		if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == "XMLHttpRequest") {
		
			header("Content-Type: text/html; charset=utf-8");
			header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
			header("Cache-Control: no-store, no-cache, must-revalidate");
			header("Pragma: no-cache");
			
			$action = $_REQUEST['action'];
			$action_method = "ajax_" . $action;
			
			if (empty($action) || !method_exists($controller, $action_method)) {
				$controller->error404();
			}
			
			$controller->ajax = true;
			
			echo $controller->$action_method();
			
		}
		
		return true;
		
	}
	
	static public function reload() {
		
		header("Location: http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
	
		die;
		
	}
	
	static public function redirect($url = false, $code = 301) {
		
		if (empty($url)) {
			self::reload();
		}
		
		if ($code == 301) {
			header("HTTP/1.0 301 Moved Permanently");
		} else if ($code == 404) {
			header("HTTP/1.0 404 Not Found");
		}
		
		if (preg_match("/^(http|https)/i", $url)) {
			header("Location: " . $url);
		} else {
			header("Location: http://" . $_SERVER['HTTP_HOST'] . $url);
		}
		
		die;
		
	}

}