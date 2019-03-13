<?php

class controller_articles extends Controller {

	protected function _start() {
		
		if (!$this->ajax) {
			$this->model->articles();
			if (!isset(Router::$routes[1])) {
				$this->articles_index();
			} else {
				$this->article(Router::$routes[1]);
			}
		}
		
		return true;
		
	}
	
	public function articles_index() {
		
		$this->model->articles_index();
		
		$this->content("articles.list.tpl");
		
		return true;
		
	}
	
	public function article($slug) {
		
		if (!$this->model->article($slug)) {
			$this->error404();
		}
		
		$this->content("articles.item.tpl");
		
		return true;
	
	}
	
}