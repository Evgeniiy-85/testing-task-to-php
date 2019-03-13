<?php

class model_admin_products extends model_admin {

	/**
	 * @var array
	 */
	public $products;
	
	public $product;
	
	public function products() {
		
		$this->tpl['page_name'] = "Каталог товаров";
		
		$this->bc_add($this->tpl['page_name'], "/admin/products/");
		
		return true;
		
	}
	
	public function products_item($product_id) {
		
		$this->product = pn_product_get($product_id);
		
		if (!$this->product) {
			return false;
		}
		
		if (!empty($this->product['links_content'])) {
			$links_array = json_decode($this->product['links_content'], true);
			
			$data_links = array_map(function($item) {
				return $item['href'];
			}, $links_array);
			
			$this->product['links_content'] = implode("<br>", $data_links);
		}
		
		$this->tpl['product'] = $this->product;
		
		$this->tpl['page_name'] = $this->product['name'];
		
		$this->bc_add($this->tpl['page_name'], "/admin/products/?do=edit&id=" . $this->product['id']);
		
		return true;
		
	}
	
	public function products_list() {
		
		$this->listing_limit = 20;
		
		$params = array();
		
		if (isset($this->filter_data['name']) && !empty($this->filter_data['name'])) {
			$params['name_search'] = $this->filter_data['name'];
		}
		
		$params['page'] = $this->listing_page;
		$params['limit'] = $this->listing_limit;
		$params['status'] = $this->user->status;
		
		$products_data = pn_products_list($params);
		
		$this->listing($products_data['found_rows']);
		
		$this->tpl['products'] = $this->products = $products_data['products'];
		
		$this->tpl['sections_urls'] = $products_data['sections_urls'];
		
		return true;
		
	}
	
	public function products_add($data) {
		
		$this->tpl['page_name'] = "Добавление товара";
		$this->tpl['sections_tree'] = pn_sections_tree(2, $data['sections']);
		$this->bc_add($this->tpl['page_name'], "/admin/products/?do=add");
		
		if (isset($data['form_submit'])) {
			if (!pn_products_add($data)) {
				
				$this->tpl['form_data'] = $data;
				$this->errors(pn_global_errors());
			} else {
				$this->alert_message("Товар добавлен");
				Router::redirect("/admin/products/");
			}
		}
		
		return true;
		
	}
	
	public function products_edit($data) {
		
		if (empty($this->product)) {
			return false;
		}
		
		$this->tpl['page_name'] = "Редактирование товара";
		
		$this->tpl['form_data'] = $this->product;
		
		$this->tpl['sections_tree'] = pn_sections_tree(2, pn_sect_ids_to_prods_get($this->product['id']));
		
		if (isset($data['form_submit'])) {
			if (!pn_products_edit($this->product['id'], $data)) {
				$this->tpl['form_data'] = $data;
				$this->errors(pn_global_errors());
			} else {
				$this->alert_message("Товар отредактирован");
				Router::reload();
			}
		}
		
		return true;
		
	}
	
	public function products_delete($product_id) {
		
		pn_products_delete($product_id);
		
		$this->alert_message("Товар удален");
		Router::redirect("/admin/products/");
		
		return true;
		
	}
	
}

