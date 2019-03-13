<?php

class controller_index extends Controller {

	protected function _start() {
	
		$this->model->index();
		
		$this->content("homepage.tpl");
		
		return true;
	
	}
	
}