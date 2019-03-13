<?php

class model_articles extends Model {
	
	public $article = false;
	
	
	public function articles() {
		
		$this->tpl['page_name'] = "Статьи";
		
		$this->bc_add(false, "/articles/");
		
		return true;
		
	}
	
	public function articles_index() {
		
		$this->listing_limit = 10;
		
		$params = array();
		
		$params['page'] = $this->listing_page;
		$params['limit'] = $this->listing_limit;
		
		$articles_data = pn_articles_list($params);
		
		$this->listing($articles_data['found_rows']);
		
		$this->tpl['articles'] = $articles_data['articles'];
		
		return true;
		
	}
	
	public function article($slug) {
		
		$this->article = pn_articles_get($slug, "slug");
	
		if (empty($this->article)) {
			return false;
		}
		
		$this->tpl['page_name'] = $this->article['name'];
		$this->tpl['title'] = $this->article['title'];
		$this->tpl['description'] = $this->article['description'];
		$this->tpl['keywords'] = $this->article['keywords'];
		
		$this->tpl['article'] = $this->article;
		
		$this->bc_add(false, "/articles/" . $this->article['slug'] . "/");
		
		return true;
		
	}
	
}