<?php

function pn_articles_list($params = array()) {

	if (!is_array($params)) {
		return false;
	}
	
	$page = 1;
	$limit = false;
	$start = false;
	$sort_by = "add_time";
	$order = "desc";
	$name_search = false;
	$blacklist_ids = array();
	
	$result = array(
		"articles"   => array(),
		"found_rows" => 0
	);

	foreach ($params as $param_key => $param_val) {
		$$param_key = $param_val;
	}
	
	if ($limit) {
		$start = $page * $limit - $limit;
	}
	
	$clauses = array();
	
	$where_clause_sql = "";

	if (!empty($name_search)) {
		$clauses[] = "`name` LIKE '%" . DB::escape($name_search) . "%'";
	}
	
	if (!empty($blacklist_ids) && is_array($blacklist_ids)) {
		$clauses[] = "`id` NOT IN ('" . implode("','", $blacklist_ids) . "')";
	}
	
	$clauses[] = "`del` = 0";
	
	if (!empty($clauses)) {
		$where_clause_sql = " WHERE (" . implode(") AND (", $clauses) . ") ";
	}
	
	$sql = "
		SELECT SQL_CALC_FOUND_ROWS *
		FROM `articles`
		" . $where_clause_sql . "
		ORDER BY `". DB::escape($sort_by) ."` " . DB::escape($order) . "
	";
	
	if ($page && $limit) {
		$sql .= " LIMIT " . $start . ", " . $limit;
	}
	
	$rows = DB::query_fetch_all($sql);
	
	$rows_num = DB::found_rows();
	
	if (!$rows) {
		return $result;
	}
	
	$result = array(
		"articles"   => $rows,
		"found_rows" => $rows_num
	);
	
	return $result;
	
}

function pn_articles_get($id, $by = "id") {

	if ($by == "id") {
		$article = DB::query_fetch("
			SELECT *
			FROM `articles`
			WHERE `id` = '" . (int)$id . "' AND `del` = '0'
		");
	} else if ($by == "slug") {
		$article = DB::query_fetch("
			SELECT *
			FROM `articles`
			WHERE `slug` = '" . DB::escape($id) . "' AND `del` = '0'
			LIMIT 1
		");
	} else {
		return false;
	}
	
	if (!$article) {
		return false;
	}
	
	return $article;
	
}

function pn_articles_data_check($data, $id = false) {

	$data['name'] = trim($data['name']);
	$data['slug'] = trim($data['slug']);
	$data['title'] = trim($data['title']);
	$data['description'] = trim($data['description']);
	$data['keywords'] = trim($data['keywords']);
	$data['summary'] = trim($data['summary']);
	$data['content'] = trim($data['content']);
	
	if (empty($data['slug'])) {
		$data['slug'] = pn_str2slug($data['name']);
	}
	
	if (empty($data['name'])) {
		pn_global_error("Название не указано");
	}
	if (empty($data['slug'])) {
		pn_global_error("Адрес не указан");
	} else {
		$data['slug'] = pn_str2slug($data['slug']);
		
		if (!pn_articles_slug_check($data['slug'], $id)) {
			pn_global_error("Этот адрес занят");
		}
	}
	
	if (pn_global_errors()) {
		return false;
	}
	
	return $data;
	
}

function pn_articles_add($data) {
	
	if (!$data = pn_articles_data_check($data)) {
		return false;
	}
	
	$photo_dir = UPLOAD_DIR . "images/articles/";
	
	$photo = "";
	
	if (isset($_FILES['photo']['tmp_name']) && !empty($_FILES['photo']['tmp_name'])) {
		$image_info = getimagesize($_FILES['photo']['tmp_name']);
		if (!$image_info) {
			pn_global_error("Файл не является изображением");
		} else {
			if (!$photo = pn_file_copy($_FILES['photo']['tmp_name'], $photo_dir, $_FILES['photo']['name'])) {
				pn_global_error("Файл не загружен. Неизвестная ошибка");
			} else {
				$photo_image = new Images();
				$photo_image->set_full_path($photo_dir . $photo);
				$photo_image->square(200);
				$photo_image->output($photo_dir . $photo);
				
				@chmod($photo_dir . $photo, 0644);
			}
		}
	}
	
	if (pn_global_errors()) {
		return false;
	}
	
	DB::query("
		INSERT INTO `articles`
		(`name`, `slug`, `title`, `description`, `keywords`, `summary`, `content`, `photo`) VALUES (
		'" . DB::escape($data['name']) . "',
		'" . DB::escape($data['slug']) . "',
		'" . DB::escape($data['title']) . "',
		'" . DB::escape($data['description']) . "',
		'" . DB::escape($data['keywords']) . "',
		'" . DB::escape($data['summary']) . "',
		'" . DB::escape($data['content']) . "',
		'" . DB::escape($photo) . "'
		)
	");
	
	return true;
	
}

function pn_articles_edit($id, $data) {
	
	if (!$data = pn_articles_data_check($data, $id)) {
		return false;
	}
	
	$article = pn_articles_get($id);
	
	$photo_dir = UPLOAD_DIR . "images/articles/";
	
	$photo = $article['photo'];
	
	if ($data['photo_remove']) {
		$photo = "";
	}
	
	if (isset($_FILES['photo']['tmp_name']) && !empty($_FILES['photo']['tmp_name'])) {
		$image_info = getimagesize($_FILES['photo']['tmp_name']);
		if (!$image_info) {
			pn_global_error("Файл не является изображением");
		} else {
			if (!$photo = pn_file_copy($_FILES['photo']['tmp_name'], $photo_dir, $_FILES['photo']['name'])) {
				pn_global_error("Файл не загружен. Неизвестная ошибка");
			} else {
				$photo_image = new Images();
				$photo_image->set_full_path($photo_dir . $photo);
				$photo_image->square(200);
				$photo_image->output($photo_dir . $photo);
				
				@chmod($photo_dir . $photo, 0644);
			}
		}
	}
	
	if (pn_global_errors()) {
		return false;
	}
	
	DB::query("
		UPDATE `articles` SET
		`name` = '" . DB::escape($data['name']) . "',
		`slug` = '" . DB::escape($data['slug']) . "',
		`title` = '" . DB::escape($data['title']) . "',
		`description` = '" . DB::escape($data['description']) . "',
		`keywords` = '" . DB::escape($data['keywords']) . "',
		`summary` = '" . DB::escape($data['summary']) . "',
		`content` = '" . DB::escape($data['content']) . "',
		`photo` = '" . DB::escape($photo) . "'
		WHERE `id` = '" . (int)$id . "'
	");
	
	return true;
	
}

function pn_articles_delete($id) {

	DB::query("UPDATE `articles` SET `del` = '1' WHERE `id` = '" . (int)$id . "'");
	
	return true;

}

function pn_articles_slug_check($slug, $id = 0) {
	
	$page_sql_extra = "";
	
	if ($id) {
		$page_sql_extra = "AND `id` <>  '" . (int)$id . "'";
	}
	
	$article = DB::query_fetch("
		SELECT `id`
		FROM `articles`
		WHERE `slug` = '" . DB::escape($slug) . "'
			AND `del` = '0'
			" . $page_sql_extra . "
		LIMIT 1
	");
	
	if ($article) {
		return false;
	}
	
	return true;
	
}