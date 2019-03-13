<?php

class model_news extends Model {
	
	public $article = false;
	
	
	public function news() {
		
		$this->tpl['page_name'] = "Новости";
		
		$this->bc_add(false, "/news/");
		
		return true;
		
	}
	
	public function news_index() {
		
		$this->listing_limit = 10;
		
		$params = array();
		
		$params['page'] = $this->listing_page;
		$params['limit'] = $this->listing_limit;
		$params['published'] = true;
		
		$news_data = pn_news_list($params);
		
		$this->listing($news_data['found_rows']);
		
		$this->tpl['news'] = $news_data['news'];
		
		return true;
		
	}
	
	public function news_item($id) {
		
		$this->article = pn_news_get($id);
	
		if (empty($this->article)) {
			return false;
		}
		
		$this->tpl['page_name'] = $this->article['name'];
		$this->tpl['title'] = $this->article['title'];
		$this->tpl['description'] = $this->article['description'];
		$this->tpl['keywords'] = $this->article['keywords'];
		
		$this->tpl['article'] = $this->article;
		
		$this->bc_add(false, "/news/" . $this->article['id'] . "/");
		
		return true;
		
	}
	
}