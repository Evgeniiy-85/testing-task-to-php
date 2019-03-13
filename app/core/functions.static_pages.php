<?php

function pn_static_pages_get($id, $by = "slug") {
	
	if ($by == "slug") {
		
		$id = urldecode($id);
		$page = DB::query_fetch("SELECT * FROM `static_pages` WHERE `slug` = '" . DB::escape($id) . "' AND `del` = 0 LIMIT 1");
		
	} else if ($by == "id") {
		
		$page = DB::query_fetch("SELECT * FROM `static_pages` WHERE `id` = '" . (int)$id . "' AND `del` = 0 LIMIT 1");
		
	} else {
		
		return false;
		
	}
	
	return $page;
	
}

function pn_static_pages_data_check($data, $id = false) {

	$data['slug'] = trim($data['slug']);
	$data['name'] = trim($data['name']);
	$data['title'] = trim($data['title']);
	$data['description'] = trim($data['description']);
	$data['keywords'] = trim($data['keywords']);
	$data['content'] = trim($data['content']);
	
	if (empty($data['name'])) {
		pn_global_error("Название страницы не указано");
	}
	if (empty($data['slug'])) {
		pn_global_error("Адрес страницы не указан");
	} else {
		$data['slug'] = pn_str2slug($data['slug']);
		
		if (!pn_static_pages_slug_check($data['slug'], $id)) {
			pn_global_error("Этот адрес занят");
		}
	}
	
	if (pn_global_errors()) {
		return false;
	}
	
	return $data;
	
}

function pn_static_pages_add($data) {
	
	if (!$data = pn_static_pages_data_check($data)) {
		return false;
	}
	
	DB::query("
		INSERT INTO `static_pages`
		(`slug`, `name`, `title`, `description`, `keywords`, `content`) VALUES (
		'" . DB::escape($data['slug']) . "',
		'" . DB::escape($data['name']) . "',
		'" . DB::escape($data['title']) . "',
		'" . DB::escape($data['description']) . "',
		'" . DB::escape($data['keywords']) . "',
		'" . DB::escape($data['content']) . "'
		)
	");
	
	return true;
	
}

function pn_static_pages_edit($id, $data) {
	
	if (!$data = pn_static_pages_data_check($data, $id)) {
		return false;
	}
	
	DB::query("
		UPDATE `static_pages` SET
		`slug` = '" . DB::escape($data['slug']) . "',
		`name` = '" . DB::escape($data['name']) . "',
		`title` = '" . DB::escape($data['title']) . "',
		`description` = '" . DB::escape($data['description']) . "',
		`keywords` = '" . DB::escape($data['keywords']) . "',
		`content` = '" . DB::escape($data['content']) . "'
		WHERE `id` = '" . (int)$id . "'
	");
	
	return $data;
	
}

function pn_static_pages_delete($id) {

	DB::query("UPDATE `static_pages` SET `del` = 1 WHERE `id` = '" . (int)$id . "'");
	
	return true;

}

function pn_static_pages_slug_check($slug, $id = 0) {
	
	$reserved = array(
		"admin", "users", "user", "oauth", "404", "cabinet", "login", "register",
		"uploader", "index", "robot", "search", "articles", "article"
	);
	
	if (in_array($slug, $reserved)) {
		return false;
	}

	$page_sql_extra = "";
	
	if ($id) {
		$page_sql_extra = "AND `id` <>  '" . (int)$id . "'";
	}
	
	$static_page = DB::query_fetch("
		SELECT `id`
		FROM `static_pages`
		WHERE `slug` = '" . DB::escape($slug) . "'
			AND `del` = '0'
			" . $page_sql_extra . "
		LIMIT 1
	");
	
	if ($static_page) {
		return false;
	}
	
	return true;
	
}