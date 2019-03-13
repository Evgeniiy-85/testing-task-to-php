<?php

function pn_news_list($params = array()) {

	if (!is_array($params)) {
		return false;
	}
	
	$page = 1;
	$limit = false;
	$start = false;
	$sort_by = "add_date";
	$order = "desc";
	$name_search = false;
	$published = false;
	$period_from = false;
	$period_to = false;
	$blacklist_ids = array();
	
	$result = array(
		"news"       => array(),
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
	
	if ($published) {
		$clauses[] = "`add_date` <= '" . date("Y-m-d", time()) . "'";
	}
	
	if (!empty($period_from) && preg_match("/^[\d]{2}.[\d]{2}.[\d]{4}$/", $period_from)) {
		$period_from = date("Y-m-d", strtotime($period_from));
	} else {
		$period_from = false;
	}
	
	if (!empty($period_to) && preg_match("/^[\d]{2}.[\d]{2}.[\d]{4}$/", $period_to)) {
		$period_to = date("Y-m-d", strtotime($period_to));
	} else {
		$period_to = false;
	}
	
	if (!empty($period_from) && !empty($period_to)) {
		$clauses[] = "`add_date` >= '" . DB::escape($period_from) . "' AND `add_date` <= '" . DB::escape($period_to) . "'";
	} else if (!empty($period_from)) {
		$clauses[] = "`add_date` >= '" . DB::escape($period_from) . "'";
	} else if (!empty($period_to)) {
		$clauses[] = "`add_date` <= '" . DB::escape($period_to) . "'";
	}
	
	$clauses[] = "`del` = 0";
	
	if (!empty($clauses)) {
		$where_clause_sql = " WHERE (" . implode(") AND (", $clauses) . ") ";
	}
	
	$sql = "
		SELECT SQL_CALC_FOUND_ROWS *
		FROM `news`
		" . $where_clause_sql . "
		ORDER BY `". DB::escape($sort_by) ."` " . DB::escape($order) . ", `id` DESC
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
		"news"       => $rows,
		"found_rows" => $rows_num
	);
	
	return $result;
	
}

function pn_news_get($id) {

	$article = DB::query_fetch("
		SELECT *
		FROM `news`
		WHERE `id` = '" . (int)$id . "' AND `del` = '0'
	");
	
	if (!$article) {
		return false;
	}
	
	return $article;
	
}

function pn_news_data_check($data) {

	$data['name'] = trim($data['name']);
	$data['title'] = trim($data['title']);
	$data['description'] = trim($data['description']);
	$data['keywords'] = trim($data['keywords']);
	$data['summary'] = trim($data['summary']);
	$data['content'] = trim($data['content']);
	$data['add_date'] = trim($data['add_date']);
	
	if (!empty($data['add_date'])) {
		$data['add_date'] = date("Y-m-d", strtotime($data['add_date']));
	}
	
	if (empty($data['name'])) {
		pn_global_error("Название не указано");
	}
	if (!preg_match("/^[\d]{4}-[\d]{2}-[\d]{2}$/", $data['add_date'])) {
		pn_global_error("Дата не указана");
	}
	
	if (pn_global_errors()) {
		return false;
	}
	
	return $data;
	
}

function pn_news_add($data) {
	
	if (!$data = pn_news_data_check($data)) {
		return false;
	}
	
	if (pn_global_errors()) {
		return false;
	}
	
	DB::query("
		INSERT INTO `news`
		(`name`, `title`, `description`, `keywords`, `summary`, `content`, `add_date`) VALUES (
		'" . DB::escape($data['name']) . "',
		'" . DB::escape($data['title']) . "',
		'" . DB::escape($data['description']) . "',
		'" . DB::escape($data['keywords']) . "',
		'" . DB::escape($data['summary']) . "',
		'" . DB::escape($data['content']) . "',
		'" . DB::escape($data['add_date']) . "'
		)
	");
	
	$article_id = DB::insert_id();
	
	return $article_id;
	
}

function pn_news_edit($id, $data) {
	
	if (!$data = pn_news_data_check($data)) {
		return false;
	}

	if (pn_global_errors()) {
		return false;
	}
	
	DB::query("
		UPDATE `news` SET
		`name` = '" . DB::escape($data['name']) . "',
		`title` = '" . DB::escape($data['title']) . "',
		`description` = '" . DB::escape($data['description']) . "',
		`keywords` = '" . DB::escape($data['keywords']) . "',
		`summary` = '" . DB::escape($data['summary']) . "',
		`content` = '" . DB::escape($data['content']) . "',
		`add_date` = '" . DB::escape($data['add_date']) . "'
		WHERE `id` = '" . (int)$id . "'
	");
	
	return true;
	
}

function pn_news_delete($id) {

	DB::query("UPDATE `news` SET `del` = '1' WHERE `id` = '" . (int)$id . "'");
	
	return true;

}