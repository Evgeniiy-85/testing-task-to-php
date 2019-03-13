<?php

class model_users extends Model {

	public function init() {
	
		$this->tpl['page_name'] = "Пользователи";
		
		return true;
		
	}
	
	public function login() {
	
		$this->tpl['page_name'] = "Вход";
		
		$this->bc_add();
		
		return true;
		
	}
	
}