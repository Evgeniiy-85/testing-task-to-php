<?php

class model_admin_news extends model_admin {

	/**
	 * @var array
	 */
	public $article;
	
	
	public function news() {
		
		$this->tpl['page_name'] = "Новости";
		
		$this->bc_add($this->tpl['page_name'], "/admin/news/");
		
		return true;
		
	}
	
	public function news_item($item_id) {
		
		$article = pn_news_get($item_id);
		
		if (!$article) {
			return false;
		}
		
		$this->tpl['article'] = $this->article = $article;
		
		$this->tpl['page_name'] = $article['name'];
		
		$this->bc_add($this->tpl['page_name'], "/admin/news/?do=edit&id=" . $article['id']);
		
		return true;
		
	}
	
	public function news_list() {
		
		$this->listing_limit = 20;
		
		$params = array();
		
		if (isset($this->filter_data['name']) && !empty($this->filter_data['name'])) {
			$params['name_search'] = $this->filter_data['name'];
		}
		if (isset($this->filter_data['period_from'])) {
			$params['period_from'] = $this->filter_data['period_from'];
		}
		if (isset($this->filter_data['period_to'])) {
			$params['period_to'] = $this->filter_data['period_to'];
		}
		
		$params['page'] = $this->listing_page;
		$params['limit'] = $this->listing_limit;
		
		$news_data = pn_news_list($params);
		
		$this->listing($news_data['found_rows']);
		
		$this->tpl['news'] = $news_data['news'];
		
		return true;
		
	}
	
	public function news_add($data) {
		
		$this->tpl['page_name'] = "Добавление новости";
		
		$this->bc_add($this->tpl['page_name'], "/admin/news/?do=add");
		
		if (isset($data['form_submit'])) {
			
			if (!pn_news_add($data)) {
				
				$this->tpl['form_data'] = $data;
				$this->errors(pn_global_errors());
				
			} else {
				
				$this->alert_message("Новость добавлена");
				Router::redirect("/admin/news/");
				
			}
			
		}
		
		return true;
		
	}
	
	public function news_edit($data) {
		
		if (empty($this->article)) {
			return false;
		}
		
		$this->tpl['page_name'] = "Редактирование новости";
		
		$this->tpl['form_data'] = $this->article;
		
		if (isset($data['form_submit'])) {
			
			if (!pn_news_edit($this->article['id'], $data)) {
				
				$this->tpl['form_data'] = $data;
				$this->errors(pn_global_errors());
				
			} else {
				
				$this->alert_message("Новость отредактирована");
				Router::reload();
				
			}
			
		}
		
		return true;
		
	}
	
	public function news_delete($item_id) {
		
		pn_news_delete($item_id);
		
		$this->alert_message("Статья удалена");
		Router::redirect("/admin/news/");
		
		return true;
		
	}
	
}