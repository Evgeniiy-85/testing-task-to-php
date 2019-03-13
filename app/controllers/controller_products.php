<?php

class controller_products extends Controller {

	protected function _start() {
		$url = '/' . implode('/', Router::$routes) . '/';
		
		$section = pn_section_by_get($url, 'url');
		
		$this->model->products($section, $url);
		
		if ($section) {
			$this->products_index();
		} else {
			$this->products_item();
		}
		
		return true;
		
	}
	
	public function products_index() {
		
		if (!$this->model->products_index()) {
			$this->error404();
		}
		
		$this->content("products.list.tpl");
		
		return true;
		
	}
	
	public function products_item() {
		
		if (!$this->model->products_item()) {
			$this->error404();
		}
		
		$this->content("products.item.tpl");
		
		return true;
	
	}
	
}