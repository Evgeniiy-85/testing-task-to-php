<?php

class model_admin extends Model {

	/**
	 * @var array
	 */
	public $tabs = array();

	/**
	 * @var array
	 */
	public $filter_data = array();
	
	
	public function init() {
		
		$this->tpl['layout'] = "admin";
		
		$this->tpl['page_name'] = "Администрирование";
		
		$this->tpl['tabs'] = $this->tabs;
		
		$this->bc_add(false, "/admin/");
		
		if (isset($_GET['filter']) && !empty($_GET['filter']) && is_array($_GET['filter'])) {
			foreach ($_GET['filter'] as $filter_key => $filter_value) {
				$this->filter_data[$filter_key] = $filter_value;
			}
			$this->tpl['filter_data'] = $this->filter_data;
		}
		
		return true;
		
	}
	
	public function tabs_add($id, $name, $url) {
		
		$this->tabs[$id] = array(
			"name"  => $name,
			"url"   => $url
		);
		
		$this->tpl['tabs'] = $this->tabs;
		
		return true;
		
	}
	
	public function tabs_remove($id) {
		
		unset($this->tabs[$id]);
		
		$this->tpl['tabs'] = $this->tabs;
		
		return true;
		
	}
	
	public function tabs_select($id) {
		
		$this->tabs[$id]['selected'] = true;
		
		$this->tpl['tabs'] = $this->tabs;
		
		return true;
		
	}
	
	public function menu($data) {
		
		$this->tpl['page_name'] = "Меню сайта";
		
		$this->bc_add(false, "/admin/menu/");
		
		$main_menu = pn_menu_get();
		
		if (!empty($data)) {
			
			pn_menu_edit($data);
			$this->alert_message("Изменения сохранены");
			Router::reload();
			
		}
		
		$this->tpl['main_menu'] = $main_menu;
		
		return true;
		
	}
	
	public function index() {
		
		return true;
		
	}
	
}