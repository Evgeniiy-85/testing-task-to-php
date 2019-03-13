<?php

class model_admin_static_pages extends model_admin {
	
	public function static_pages() {
	
		$this->tpl['page_name'] = "Статичные страницы";
		
		$this->bc_add($this->tpl['page_name'], "/admin/static-pages/");
		
		return true;
	
	}
	
	public function static_pages_list() {
		
		$pages = DB::query_fetch_all("SELECT * FROM `static_pages` WHERE `del` = '0' ORDER BY `name` ASC");
		
		$this->tpl['static_pages'] = $pages;
		
		return true;
		
	}
	
	public function static_pages_edit($id, $data) {
	
		$this->tpl['page_name'] = "Редактирование страницы";
		
		if (!$page = pn_static_pages_get($id, "id")) {
			return false;
		}
		
		$this->bc_add($this->tpl['page_name'], "/admin/static-pages/?do=edit&id=" . $page['id']);
		
		$this->tpl['static_page'] = $page;
		
		$this->tpl['form_data'] = $page;
		
		if (isset($data['form_submit'])) {
			
			if (!pn_static_pages_edit($id, $data)) {
				
				$this->tpl['form_data'] = $data;
				$this->errors(pn_global_errors());
				
			} else {
				
				$this->alert_message("Изменения сохранены");
				Router::reload();
				
			}
			
		}
		
		return true;
	
	}
	
	public function static_pages_add($data) {
	
		$this->tpl['page_name'] = "Создание страницы";
		
		$this->bc_add($this->tpl['page_name'], "/admin/static-pages/?do=add");
		
		if (isset($data) && !empty($data)) {
			
			if (!pn_static_pages_add($data)) {
				
				$this->tpl['form_data'] = $data;
				$this->errors(pn_global_errors());
				
			} else {
				
				$this->alert_message("Страница создана");
				Router::redirect("/admin/static-pages/");
				
			}
			
		}
		
		return true;
	
	}
	
	public function static_pages_delete($id) {
		
		pn_static_pages_delete($id);
		
		$this->alert_message("Страница удалена");
		Router::redirect("/admin/static-pages/");
		
		return true;
		
	}
	
}