<?php

function pn_menu_get() {
	
	$menu = DB::query_fetch_all("SELECT * FROM `menu` WHERE `del` = '0' ORDER BY `sort` ASC");
	
	if (!$menu) {
		return array();
	}
	
	$parents = array();
	$children = array();
	
	foreach ($menu as $_item) {
		if (!$_item['parent_id']) {
			$parents[] = $_item;
		} else {
			$children[$_item['parent_id']][] = $_item;
		}
	}
	
	for ($i = 0; $i < count($parents); $i++) {
		if (isset($children[$parents[$i]['id']]) && !empty($children[$parents[$i]['id']])) {
			$parents[$i]['children'] = $children[$parents[$i]['id']];
		} else {
			$parents[$i]['children'] = array();
		}
	}
	
	return $parents;
	
}

function pn_menu_edit($data) {
	
	if (!empty($data['name'])) {
		foreach ($data['name'] as $_id => $_name) {
			
			$_name = trim($_name);
			$_url = trim($data['url'][$_id]);
			$_blank = (int)$data['blank'][$_id];
			$_sort = (int)$data['sort'][$_id];
			$_del = (bool)$data['del'][$_id];
			
			DB::query("
				UPDATE `menu` SET
				`name` = '" . DB::escape($_name) . "',
				`url` = '" . DB::escape($_url) . "',
				`blank` = '" . DB::escape($_blank) . "',
				`sort` = '" . DB::escape($_sort) . "',
				`del` = '" . DB::escape($_del) . "'
				WHERE `id` = '" . (int)$_id . "'
			");
			
		}
	}
	
	if (!empty($data['new_name'])) {
		foreach ($data['new_name'] as $_id => $_name) {
			$new_name = trim($data['new_name'][$_id]);
			if (empty($new_name)) {
				continue;
			}
			$new_url = trim($data['new_url'][$_id]);
			$new_blank = (int)$data['new_blank'][$_id];
			$new_sort = (int)$data['new_sort'][$_id];
			$new_parent_id = (int)$data['new_parent_id'][$_id];
			
			DB::query("
				INSERT INTO `menu`
				(`parent_id`, `name`, `url`, `blank`, `sort`) VALUES (
					'" . DB::escape($new_parent_id) . "',
					'" . DB::escape($new_name) . "',
					'" . DB::escape($new_url) . "',
					'" . DB::escape($new_blank) . "',
					'" . DB::escape($new_sort) . "'
				)
			");
		}
	}
	
	return true;
	
}