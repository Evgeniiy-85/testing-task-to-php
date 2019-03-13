<?php

class model_admin_articles extends model_admin {

	/**
	 * @var array
	 */
	public $article;
	
	
	public function articles() {
		
		$this->tpl['page_name'] = "Статьи";
		
		$this->bc_add($this->tpl['page_name'], "/admin/articles/");
		
		return true;
		
	}
	
	public function articles_item($article_id) {
		
		$article = pn_articles_get($article_id);
		
		if (!$article) {
			return false;
		}
		
		$this->tpl['article'] = $this->article = $article;
		
		$this->tpl['page_name'] = $article['name'];
		
		$this->bc_add($this->tpl['page_name'], "/admin/articles/?do=edit&id=" . $article['id']);
		
		return true;
		
	}
	
	public function articles_list() {
		
		$this->listing_limit = 20;
		
		$params = array();
		
		if (isset($this->filter_data['name']) && !empty($this->filter_data['name'])) {
			$params['name_search'] = $this->filter_data['name'];
		}
		
		$params['page'] = $this->listing_page;
		$params['limit'] = $this->listing_limit;
		
		$articles_data = pn_articles_list($params);
		
		$this->listing($articles_data['found_rows']);
		
		$this->tpl['articles'] = $articles_data['articles'];
		
		return true;
		
	}
	
	public function articles_add($data) {
		
		$this->tpl['page_name'] = "Добавление статьи";
		
		$this->bc_add($this->tpl['page_name'], "/admin/articles/?do=add");
		
		if (isset($data['form_submit'])) {
			
			if (!pn_articles_add($data)) {
				
				$this->tpl['form_data'] = $data;
				$this->errors(pn_global_errors());
				
			} else {
				
				$this->alert_message("Статья добавлена");
				Router::redirect("/admin/articles/");
				
			}
			
		}
		
		return true;
		
	}
	
	public function articles_edit($data) {
		
		if (empty($this->article)) {
			return false;
		}
		
		$this->tpl['page_name'] = "Редактирование статьи";
		
		$this->tpl['form_data'] = $this->article;
		
		if (isset($data['form_submit'])) {
			
			if (!pn_articles_edit($this->article['id'], $data)) {
				
				$this->tpl['form_data'] = $data;
				$this->errors(pn_global_errors());
				
			} else {
				
				$this->alert_message("Статья отредактирована");
				Router::reload();
				
			}
			
		}
		
		return true;
		
	}
	
	public function articles_delete($article_id) {
		
		pn_articles_delete($article_id);
		
		$this->alert_message("Статья удалена");
		Router::redirect("/admin/articles/");
		
		return true;
		
	}
	
}