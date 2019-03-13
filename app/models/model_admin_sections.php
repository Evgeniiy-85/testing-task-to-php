<?php

class model_admin_sections extends model_admin {

	/**
	 * @var array
	 */
	public $sections;
	
	public $section;
	
	public function sections() {
		
		$this->tpl['page_name'] = "Разделы";
		
		$this->bc_add($this->tpl['page_name'], "/admin/sections/");
		
		return true;
		
	}
	
	public function sections_item($section_id) {
		
		$this->section = pn_section_by_get($section_id);
		
		if (!$this->section) {
			return false;
		}
		
		$this->tpl['section'] = $this->section;
		
		$this->tpl['page_name'] = $this->section['name'];
		
		$this->bc_add($this->tpl['page_name'], "/admin/sections/?do=edit&id=" . $this->section['id']);
		
		return true;
		
	}
	
	public function sections_list() {
		
		$this->listing_limit = 20;
		
		$params = [];
		
		if (isset($this->filter_data['name']) && !empty($this->filter_data['name'])) {
			$params['name_search'] = $this->filter_data['name'];
		}
		
		$params['page'] = $this->listing_page;
		$params['limit'] = $this->listing_limit;
		
		$sections_data = pn_sections_list($params);
		
		$this->listing($sections_data['found_rows']);
		
		$this->tpl['sections'] = $this->sections = $sections_data['sections'];
		
		return true;
		
	}
	
	public function sections_add($data) {
		
		$this->tpl['page_name'] = "Добавление раздела";
		
		$this->bc_add($this->tpl['page_name'], "/admin/sections/?do=add");
		
		$this->tpl['sections_tree'] = pn_sections_tree(3, [$data['section']]);
		
		if (isset($data['form_submit'])) {
			if (!pn_sections_add($data)) {
				$this->tpl['form_data'] = $data;
				
				$this->errors(pn_global_errors());
			} else {
				$this->alert_message("Раздел добавлен");
				
				Router::redirect("/admin/sections/");
			}
		}
		
		return true;
		
	}
	
	public function sections_edit($data) {
		
		if (empty($this->section)) {
			return false;
		}
		
		$this->tpl['page_name'] = "Редактирование раздела";
		
		$this->tpl['form_data'] = $this->section;
		
		$this->tpl['section'] = pn_section_by_get($this->section['id']);
		
		$this->tpl['sections_tree'] = pn_sections_tree(3, [$this->section['parent']], $this->section['id']);
		
		if (isset($data['form_submit'])) {
			if (!pn_sections_edit($this->section, $data)) {
				$this->tpl['form_data'] = $data;
				
				$this->errors(pn_global_errors());
			} else {
				$this->alert_message("Товар отредактирован");
				
				Router::reload();
			}
		}
		
		return true;
		
	}
	
	public function sections_delete($section_id) {
		
		pn_sections_delete($section_id);
		
		$this->alert_message("Товар удален");
		
		Router::redirect("/admin/sections/");
		
		return true;
		
	}
}

