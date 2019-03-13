<?php

class model_products extends Model {
	
	public $product = false;
	public $section = false;
	public $url = false;
	
	public function products($section, $url) {
		
		$this->url = $url;
		
		if ($section) {
			$this->section = $section;
		} else {
			$this->section = pn_section_by_url_get($url);
		}
		
		foreach (explode('/', trim($this->url, '/')) as $part_url) {
			$part_section = pn_section_get_by_slug($part_url);
			
			if (!$part_section) {
				break;
			}
			
			$this->bc_add($part_section['name'], $part_section['url']);
		}
		
		$this->tpl['sections_tree'] = pn_sections_tree(1, [$this->section['id']]);
		
		return true;
		
	}
	
	public function products_index() {
		
		$this->tpl['page_name'] = $this->section['name'];
		$this->tpl['title'] = $this->section['title'];
		$this->tpl['description'] = $this->section['description'];
		$this->tpl['keywords'] = $this->section['keywords'];
		
		$this->listing_limit = 10;
		
		$params = [];
		
		$params['page'] = $this->listing_page;
		$params['limit'] = $this->listing_limit;
		$params['url'] = $this->url;
		
		$products_data = pn_products_list($params);
		
		if (!$products_data['found_rows']) {
			return false;
		}
		
		$this->tpl['products'] = $products_data['products'];
		
		$this->listing($products_data['found_rows']);
		
		return true;
		
	}
	
	public function products_item() {
		
		$this->product = pn_product_get($this->url, 'url');
		
		if (!$this->section || !$this->product) {
			return false;
		}
		
		$this->bc_add($this->product['name'], $this->product['slug']);
		
		$this->tpl['page_name'] = $this->product['name'];
		$this->tpl['title'] = $this->product['title'];
		$this->tpl['description'] = $this->product['description'];
		$this->tpl['keywords'] = $this->product['keywords'];
		
		$this->tpl['product'] = $this->product;
		$this->tpl['product_url'] = $this->url;
		$this->tpl['links'] = json_decode($this->product['links_content'], true);
		
		return true;
		
	}
}