<?php

class model_admin_options extends model_admin {
	
	public function options() {
		
		$this->tpl['page_name'] = "Настройки";
		
		$this->tabs_add("options", "Общие настройки", "/admin/options/basic/");
		$this->tabs_add("homepage", "Главная страница", "/admin/options/homepage/");
		
		return true;
		
	}
	
	public function options_basic($data) {
		
		$options = DB::query_fetch("SELECT * FROM `options_basic`");
		
		$this->tpl['page_name'] = "Общие настройки сайта";
		
		$this->bc_add();
		
		$this->tabs_select("options");
		
		$this->tpl['form_data'] = $options;
		
		if (isset($data['form_submit'])) {
			
			$new_password = false;
			
			if (!empty($data['password_old']) && !empty($data['password_new']) && !empty($data['password_new_copy'])) {
				if (pn_hash($data['password_old']) != $this->user->password) {
					$this->error("Старый пароль указан неверно");
				} else if ($data['password_new'] != $data['password_new_copy']) {
					$this->error("Копии нового пароля не совпадают");
				} else {
					$new_password = $data['password_new'];
				}
			}
			
			if ($this->get_errors()) {
				
				$this->tpl['errors'] = $this->get_errors();
				$this->tpl['form_data'] = $data;
				
			} else {
				
				if ($new_password) {
					DB::query("UPDATE `users` SET `password` = '" . DB::escape(pn_hash($new_password)) . "' WHERE `id` = '" . $this->user->id . "'");
				}
			
				DB::query("
					UPDATE `options_basic` SET
					`site_name` = '" . DB::escape($data['site_name']) . "'
				");
				
				$this->alert_message("Изменения сохранены");
				
				Router::reload();
			
			}
			
		}
		
		return true;
		
	}
	
	public function options_homepage($data) {
		
		$options = DB::query_fetch("SELECT * FROM `options_homepage`");
		
		$this->tpl['page_name'] = "Настройки главной страницы";
		
		$this->bc_add();
		
		$this->tabs_select("homepage");
		
		$this->tpl['form_data'] = $options;
		
		if (isset($data['form_submit'])) {
			
			if ($this->get_errors()) {
				
				$this->tpl['errors'] = $this->get_errors();
				$this->tpl['form_data'] = $data;
				
			} else {
				
				DB::query("
					UPDATE `options_homepage` SET
					`title` = '" . DB::escape($data['title']) . "',
					`description` = '" . DB::escape($data['description']) . "',
					`keywords` = '" . DB::escape($data['keywords']) . "',
					`content` = '" . DB::escape($data['content']) . "'
				");
				
				$this->alert_message("Изменения сохранены");
				
				Router::reload();
			
			}
			
		}
		
		return true;
		
	}
	
}