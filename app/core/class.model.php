<?php

class Model {

	/**
	 * @var array
	 */
	public $options_basic = array();

	/**
	 * @var array
	 */
	public $tpl = array(
		"layout"          => "default",
		"site_name"       => "",
		"page_name"       => false,
		"title"           => false,
		"description"     => false,
		"keywords"        => false,
		"content"         => "",
		"user"            => false,
		"breadcrumbs"     => array(),
		"listing_data"    => array(),
		"alert_message"   => false,
		"errors"          => array()
	);

	/**
	 * @var Users
	 */
	public $user;

	/**
	 * @var Smarty
	 */
	public $view;

	/**
	 * @var array
	 */
	public $errors = array();

	/**
	 * @var array
	 */
	public $options = array();

	/**
	 * @var int
	 */
	public $listing_page = 1;

	/**
	 * @var int
	 */
	public $listing_limit = 10;

	/**
	 * @var string
	 */
	public $listing_sharp;

	/**
	 * @var bool
	 */
	public $listing_arrows = true;

	/**
	 * @var string
	 */
	public $listing_request_uri;

	/**
	 * @var int
	 */
	public $listing_side = 3;
	
	
	public function __construct() {
		
		if (isset($_GET['page'])) {
			$this->listing_page = (int)$_GET['page'];
		}
	
		$this->tpl['options_basic'] = $this->options_basic = DB::query_fetch("SELECT * FROM `options_basic`");
		$this->tpl['site_name'] = $this->options_basic['site_name'];
		$this->tpl['alert_message'] = $this->alert_message_get();
		$this->tpl['main_menu'] = pn_menu_get();
		
		return true;
		
	}
	
	public function static_page($slug) {
	
		$page = pn_static_pages_get($slug);
		
		if (!$page) {
			return false;
		}
		
		$this->bc_add($page['name']);
		
		$this->tpl['page_name'] = $page['name'];
		$this->tpl['static_page'] = $page;
		$this->tpl['title'] = $page['title'];
		$this->tpl['description'] = $page['description'];
		$this->tpl['keywords'] = $page['keywords'];
		
		$this->tpl['static_page'] = $page;
		
		$this->tpl['layout'] = "static-page";
		
		return true;
	
	}
	
	public function listing($all_elems) {
		
		if ($all_elems <= $this->listing_limit) {
			return false;
		}
		
		if (isset($_GET['page']) && is_numeric($_GET['page'])) {
			$this->listing_page = (int)$_GET['page'];
		}
		
		$listing_data = array();
		$pages = array();
		$all_pages = array();
		$query_reg_mask = "page=[\d]*";
		
		$server_request_uri = $_SERVER['REQUEST_URI'];
		$server_query_string = $_SERVER['QUERY_STRING'];
		
		if (!empty($this->listing_request_uri)) {
			$server_request_uri = $this->listing_request_uri;
			$server_query_string = parse_url($server_request_uri);
			$server_query_string = $server_query_string['query'];
		}
		
		if (!is_numeric($this->listing_page) || $this->listing_page < 2) {
			$this->listing_page = 1;
		}
		
		if (empty($server_query_string) || preg_match("/^" . $query_reg_mask . "$/i", $server_query_string)) {
			$query_implode_symb = "?";
		} else {
			$query_implode_symb = "&";
		}
		
		$num_pages = (int)ceil($all_elems/$this->listing_limit);
		
		for ($i = 1; $i <= $num_pages; $i++) {
		
			if ($i == 1) {
				$pages[$i]['url'] = preg_replace("/(\?|\&)" . $query_reg_mask . "/i", "", $server_request_uri);
				$listing_data['listing_start'] = $pages[$i]['url'];
			} else {
				$pages[$i]['url'] = preg_replace("/(\?|\&)" . $query_reg_mask . "/i", "", $server_request_uri) . $query_implode_symb . "page=" . $i;
			}
			
			if (!empty($this->listing_sharp)) {
				$pages[$i]['url'] .= "#" . $this->listing_sharp;
			}
			
			if ($i == $num_pages) {
				$listing_data['listing_end'] = $pages[$i]['url'];
			}
			
			$pages[$i]['page'] = $pages[$i]['page_num'] = $i;
			
			if ($i == $this->listing_page) {
				$pages[$i]['this'] = true;
			}
			
			$all_pages[] = $pages[$i];
			
		}
		
		
		// Обрезаем массив с номерами страниц ----------------------------
		
		if ($this->listing_page <= $this->listing_side) {
			$this->listing_side += ($this->listing_side - $this->listing_page + 1);
		}
		
		if ($this->listing_page >= $num_pages - $this->listing_side) {
			$this->listing_side += ($this->listing_side - ($num_pages - $this->listing_page));
		}
		
		for ($i = 1; $i <= $num_pages; $i++) {
		
			if ($i == 1 || $i == $num_pages || $i == $this->listing_page) {
			
				if ($i == $this->listing_page) {
				
					// left and right
					if ($this->listing_page > 1) {
						$listing_data['listing_left_url'] = $pages[$i-1]['url'];
						$listing_data['listing_left_page'] = $pages[$i-1]['page'];
					}
					
					if ($this->listing_page < $num_pages) {
						$listing_data['listing_right_url'] = $pages[$i+1]['url'];
						$listing_data['listing_right_page'] = $pages[$i+1]['page'];
					}
					// --------------
					
				}
				
				continue;
			}
			
			
			if ($i == $this->listing_page - $this->listing_side) {
				$pages[1]['page'] = "...";
				continue;
			}
			
			if ($i == $this->listing_page + $this->listing_side) {
				$pages[$num_pages]['page'] = "...";
				continue;
			}
			
			if ($i > $this->listing_page - $this->listing_side && $i < $this->listing_page) {
				continue;
			}
			
			if ($i < $this->listing_page + $this->listing_side && $i > $this->listing_page) {
				continue;
			}
			
			unset($pages[$i]);
			
		}
		// ---------------------------------------------------------------
		
		$listing_data['listing_numbers'] = $pages;
		$listing_data['full_numbers'] = $all_pages;
		$listing_data['arrows'] = $this->listing_arrows;
		
		$this->tpl['listing_data'] = $listing_data;
		
		return true;
		
	}
	
	public function bc_add($name = "", $url = "#") {
	
		if (empty($name)) {
			$name = $this->tpl['page_name'];
		}
		
		$this->tpl['breadcrumbs'][] = array("name" => $name, "url" => $url);
		
		return true;
		
	}
	
	public function bc_remove() {
	
		if (empty($this->tpl['breadcrumbs'])) {
			return false;
		}
		
		array_pop($this->tpl['breadcrumbs']);
		
		return true;
		
	}
	
	public function bc_clean() {
		
		$this->tpl['breadcrumbs'] = array();
		
		return true;
		
	}
	
	public function alert_message($msg, $type = "success") {
	
		$_SESSION['message'] = array(
			"type"     => $type,
			"text"     => $msg
		);
		
		return true;
		
	}
	
	public function alert_message_get() {
	
		if (!isset($_SESSION['message'])) {
			return false;
		}
		
		$msg = $_SESSION['message'];
		
		unset($_SESSION['message']);
		
		return $msg;
	
	}
	
	public function error404() {
	
		header("HTTP/1.1 404 Not Found");
		header("Status: 404 Not Found");
		
		$this->tpl['layout'] = "default";
		$this->tpl['page_name'] = "Ошибка 404";
		
		return true;
		
	}
	
	public function error($error, $key = false) {
	
		if (!$key) {
			$this->errors[] = $error;
		} else {
			$this->errors[$key] = $error;
		}
		
		$this->tpl['errors'] = $this->errors;
		
		return true;
	
	}
	
	public function errors($errors) {
	
		if (!is_array($errors)) {
			return false;
		}
	
		$this->errors = array_merge($this->errors, $errors);
		
		$this->tpl['errors'] = $this->errors;
		
		return true;
	
	}
	
	public function get_errors() {
	
		return (!empty($this->errors)) ? $this->errors : false;
	
	}
	
}