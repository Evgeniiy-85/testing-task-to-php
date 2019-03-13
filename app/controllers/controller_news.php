<?php

class controller_news extends Controller {

	protected function _start() {
		
		if (!$this->ajax) {
			$this->model->news();
			if (!isset(Router::$routes[1])) {
				$this->news_index();
			} else {
				$this->news_item((int)Router::$routes[1]);
			}
		}
		
		return true;
		
	}
	
	public function news_index() {
		
		
		$this->model->news_index();
		
		$this->content("news.list.tpl");
		
		return true;
		
	}
	
	public function news_item($id) {
		
		if (!$this->model->news_item($id)) {
			$this->error404();
		}
		
		$this->content("news.item.tpl");
		
		return true;
	
	}
	
}