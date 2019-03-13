<?php

function pn_products_list($params = array()) {
	
	if (!is_array($params)) {
		return false;
	}
	
	$page = 1;
	$limit = false;
	$start = false;
	$sort_by = "add_time";
	$order = "desc";
	$name_search = false;
	
	$result = array(
		"products"   => array(),
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
		$clauses[] = "`p`.`name` LIKE '%" . DB::escape($name_search) . "%'";
	}
	
	if (!empty($url)) {
		$clauses[] = "`s`.`url` like '$url%'";
	}
	
	$clauses[] = "`p`.`del` = 0";
	
	if (!empty($clauses)) {
		$where_clause_sql = " WHERE (" . implode(") AND (", $clauses) . ") ";
	}
	
	$sql = "
		SELECT SQL_CALC_FOUND_ROWS `p`.*, `s`.`url` AS sect_url
		FROM `products` AS p
		LEFT JOIN `prod_in_sections` AS pis
		ON `pis`.`prod_id` = `p`.`id`
		LEFT JOIN `sections` AS s
		ON `s`.`id` = `pis`.`sect_id`
		" . $where_clause_sql . "
		GROUP BY `p`.`id`
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
		"products"   => $rows,
		"found_rows" => $rows_num
	);
	
	return $result;
}

function pn_product_get($value, $field = 'id') {
	
	if ($field == 'url') {
		$url_data = pathinfo($value);
		$sect_url = $url_data['dirname'] . '/';
		$prod_slug = $url_data['filename'];
		
		$where_clause_sql = "`s`.`url` = '" . DB::escape($sect_url) . "' AND `p`.`slug` = '" . DB::escape($prod_slug) . "'";
	} else {
		$where_clause_sql = "`p`.`$field` = '" . DB::escape($value) . "'";
	}
	
	$product = DB::query_fetch("
		SELECT `p`.*, `s`.`url` AS sect_url, `s`.`id` AS sect_id
		FROM `products` AS p
		LEFT JOIN `prod_in_sections` AS pis ON `pis`.`prod_id` = `p`.`id`
		LEFT JOIN `sections` AS s ON `s`.`id` = `pis`.`sect_id`
		WHERE $where_clause_sql
		AND `p`.`del` = 0
		AND `s`.`del` = 0
		GROUP BY `p`.`id`
	");
	
	if (!$product) {
		return false;
	}
	
	return $product;
	
}

function pn_product_by_slug_get($slug) {
	return DB::query_fetch("SELECT * FROM `products` WHERE `slug` = '" . DB::escape($slug) . "' AND `del` = '0'");
}

function pn_products_data_check($data, $id = false) {
	
	foreach ($data as $key => $item) {
		if (is_string($item)) {
			$data[$key] = trim($item);
		}
	}
	
	if (empty($data['name'])) {
		pn_global_error("Название не указано");
	}
	
	if (!empty(pn_product_get($data['name'], 'name')) && (!$id || pn_product_get($id, 'id')['name'] != $data['name'])) {
		pn_global_error("Товар с таким названием уже существует");
	}
	
	if (empty($data['sections'])) {
		pn_global_error("Не указаны разделы для товара");
	}
	
	if (pn_global_errors()) {
		return false;
	}
	
	return $data;
	
}

function pn_products_add($data) {
	
	if (!$data = pn_products_data_check($data)) {
		return false;
	}
	
	$photo_dir = UPLOAD_DIR . "images/products/";
	
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
	
	$links_data = pn_links_content_processing($data['links_content']);
	
	if (pn_global_errors()) {
		return false;
	}
	
	DB::query("
		INSERT INTO `products`
		(`title`, `description`, `keywords`, `name`, `slug`, `content`, `photo`, `links_content`, `del`) VALUES (
		'" . DB::escape($data['title']) . "',
		'" . DB::escape($data['description']) . "',
		'" . DB::escape($data['keywords']) . "',
		'" . DB::escape($data['name']) . "',
		'" . DB::escape(pn_str2slug($data['name'])) . "',
		'" . DB::escape($data['content']) . "',
		'" . DB::escape($photo) . "',
		'" . DB::escape($links_data) . "',
		'0'
		)
	");
	
	$prod_id = DB::insert_id();
	
	foreach ($data['sections'] as $section_id) {
		$values[] = "(" . (int)$prod_id . "," . (int)$section_id . ")";
	}
	
	DB::query("
		INSERT INTO `prod_in_sections` (`prod_id`, `sect_id`)
		VALUES " . implode(',', $values) . "
	");
	
	return true;
	
}

function pn_products_edit($id, $data) {
	
	if (!$data = pn_products_data_check($data, $id)) {
		return false;
	}
	
	$product = pn_product_get($id);
	
	$photo_dir = UPLOAD_DIR . "images/products/";
	
	$photo = $product['photo'];
	
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
	
	$links_data = pn_links_content_processing($data['links_content']);
	
	if (pn_global_errors()) {
		return false;
	}
	
	DB::query("
		UPDATE `products` SET
		`name` = '" . DB::escape($data['name']) . "',
		`slug` = '" . DB::escape(pn_str2slug($data['name'])) . "',
		`title` = '" . DB::escape($data['title']) . "',
		`description` = '" . DB::escape($data['description']) . "',
		`keywords` = '" . DB::escape($data['keywords']) . "',
		`content` = '" . DB::escape($data['content']) . "',
		`photo` = '" . DB::escape($photo) . "',
		`links_content` = '" . DB::escape($links_data) . "'
		WHERE `id` = " . (int)$id . "
	");
	
	DB::query("
		DELETE FROM `prod_in_sections`
		WHERE `prod_id` = " . (int)$id . "
	");
	
	$values = [];
	
	foreach ($data['sections'] as $section_id) {
		$values[] = "(" . (int)$id . "," . (int)$section_id . ")";
	}
	
	DB::query("
		INSERT INTO `prod_in_sections` (`prod_id`, `sect_id`)
		VALUES " . implode(',', $values) . "
	");
	
	if (pn_global_errors()) {
		return false;
	}
	
	return true;
	
}

function pn_products_delete($id) {

	DB::query("UPDATE `products` SET `del` = '1' WHERE `id` = '" . (int)$id . "'");
	
	return true;

}

function pn_links_content_processing($data) {
	
	if (empty($data)) {
		return '';
	}
	
	$links_data_arr = [];
	$index = 0;
	
	$links = explode("<br />", strip_tags(str_replace("\n", "<br />", $data), '<br>'));
	
	if (!empty($links)) {
		foreach ($links as $link) {
			$link = trim(str_replace('&nbsp;', '', $link));
			
			if (empty($link)) {
				continue;
			}			
			
			$link_data = pn_url_data_get($link);
			
			if ($link_data) {
				$link_data['favicon'] = save_favicon($link_data['favicon'], $link);
			}
			
			$links_data_arr[$index++] = $link_data ? $link_data : ['href' => $link];
		}
		
		return json_encode($links_data_arr);
	}
	
	return '';
	
}

function save_favicon($favicon_url, $link) {
	if (!empty($favicon_url)) {
		$favicon_url = preg_replace('#^//#i', 'http://', $favicon_url);
	
		if (!empty($favicon = file_get_contents($favicon_url))) {
			$favicon_name = md5($link) . '.ico';
			$path = (isset($_SERVER['DOCUMENT_ROOT']) ? $_SERVER['DOCUMENT_ROOT'] : '') . '/_assets/images/sites-favicons/';

			if (file_put_contents($path . $favicon_name, $favicon)) {
				return $favicon_name;
			}
		}
	}
	
	pn_global_error("Не удалось сохранить фавикон для сайта '$link'");
	
	return '';
	
}

function pn_url_data_get($href) {
	
	$content = @file_get_contents($href);

	$data = ['name' => '', 'favicon' => '', 'href' => $href];

	if (empty($content)) {
		pn_global_error("Ошибка при обработке данных для ссылки: '$href'. Контент сайта недоспупен");
	} else {
		if(preg_match("/<title>(.*)<\/title>/siU", $content, $title_matches)) {//получаемм тайтл сайта
			$data['name'] = trim(preg_replace('/\s+/', ' ', $title_matches[1]));
		} else {
			pn_global_error("Ошибка при обработке данных для ссылки: '$href'. Тайтл сайта недоспупен");
		}
		
		$favicon_href = $href . '/favicon.ico';
		
		if (file_get_contents($favicon_href)) {
			$data['favicon'] = $favicon_href;
			return $data;
		}
		
		$dom = new DOMDocument();
		$dom->strictErrorChecking = false;
		@$dom->loadHTML($content);

		if ($dom) {//получаем фавикон сайта
			$xml = simplexml_import_dom($dom);
			$arr = $xml->xpath('//link[@rel="shortcut icon"]');
			
			if(!empty($arr) && $favicon_href = (string)$arr[0]['href']) {
				if ($favicon_href[0] == '/' && $favicon_href[1] != '/') {
					$favicon_href = '//' . parse_url($href, PHP_URL_HOST) . $favicon_href;
				}

				$data['favicon'] = $favicon_href;
				return $data;
			} else {
				pn_global_error("Ошибка при обработке данных для ссылки: '$href'. Фавикон сайта недоспупен");
			}
		} else {
			pn_global_error("Ошибка при обработке данных для ссылки: '$href'. Объект 'dom' недоспупен");
		}
	}
	
	return false;
	
}