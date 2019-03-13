<?php

class model_index extends Model {
	
	public function index() {
		
		$options_homepage = DB::query_fetch("SELECT * FROM `options_homepage`");
		
		$this->tpl['page_name'] = "Главная страница";
		$this->tpl['title'] = $options_homepage['title'];
		$this->tpl['description'] = $options_homepage['description'];
		$this->tpl['keywords'] = $options_homepage['keywords'];
		$this->tpl['options_homepage'] = $options_homepage;
		
		$this->listing_limit = 10;
		
		$params = [];
		
		$params['page'] = $this->listing_page;
		$params['limit'] = $this->listing_limit;
		
		$products_data = pn_products_list($params);
		
		$this->tpl['products'] = $products_data['products'];
		
		$this->listing($products_data['found_rows']);
		
		$this->tpl['sections_tree'] = pn_sections_tree();
		
		return true;
		
	}
	
}