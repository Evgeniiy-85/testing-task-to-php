<?php

function pn_sections_list($params = array()) {

	if (!is_array($params)) {
		return false;
	}
	
	$page = 1;
	$limit = false;
	$start = false;
	$sort_by = "name";
	$order = "asc";
	
	$result = array(
		"sections"   => array(),
		"found_rows" => 0
	);

	foreach ($params as $param_key => $param_val) {
		$$param_key = $param_val;
	}
	
	if ($limit) {
		$start = $page * $limit - $limit;
	}
	
	$clauses = array();
	
	$clauses[] = "`del` = 0";
	
	if (!empty($clauses)) {
		$where_clause_sql = " WHERE (" . implode(") AND (", $clauses) . ") ";
	}
	
	$sql = "
		SELECT SQL_CALC_FOUND_ROWS *
		FROM `sections`
		ORDER BY `". DB::escape($sort_by) ."` " . DB::escape($order) . "
	";
	
	if ($page && $limit) {
		$sql .= " LIMIT " . $start . ", " . $limit;
	}
	
	$rows_num = DB::found_rows();
	$rows = DB::query_fetch_all($sql);
	
	if (!$rows) {
		return $result;
	}
	
	$result = array(
		"sections"       => $rows,
		"found_rows" => $rows_num
	);
	
	return $result;
	
}

function pn_section_get_by_slug($slug) {
	
	return DB::query_fetch("SELECT * FROM `sections` WHERE `slug` = '" . DB::escape($slug) . "'");
	
}

function pn_section_by_get($value, $field = 'id') {
	
	$sql = "SELECT * FROM `sections` WHERE `$field` = '" . DB::escape($value) . "'";
	
	$section = DB::query_fetch($sql);
	
	return $section ? $section : false;
	
}

function pn_section_by_url_get($url) {
	
	$path_info = pathinfo($url);
	$sect_url = $path_info['dirname'] . '/';
	
	$sql = "SELECT * FROM `sections` WHERE `url` = '" . DB::escape($sect_url) . "'";
	
	return DB::query_fetch($sql);
	
}

function pn_sections_get() {
	
	return DB::query_fetch_all("SELECT * FROM `sections`");
	
}

function pn_sect_ids_to_prods_get($prod_id = null) {
	
	$where_clause = "WHERE `p`.`del` = '0'" . ($prod_id ? " AND `p`.`id` = $prod_id" : '');
	
	$sql = "
		SELECT `s`.`id` FROM `sections` AS s
		LEFT JOIN `prod_in_sections` AS pis ON `pis`.`sect_id` = `s`.`id`
		LEFT JOIN `products` AS p ON `p`.`id` = `pis`.`prod_id`
		$where_clause
		GROUP BY `s`.`id`
	";
	
	if ($sections = DB::query_fetch_all($sql)) {
		$sections_ids = [];
		
		foreach ($sections as $section) {
			$sections_ids[] = $section['id'];
		}
		
		return $sections_ids;
	}
	
	return false;
	
}

function sect_ids_to_prods_build($sects_by_id, $sect_ids_to_products, $sect_id = null) {
	
	$sections = [];
	
	if (!empty($sect_ids_to_products)) {
		if (!$sect_id) {
			$sect_id = array_shift($sect_ids_to_products);
			$sections[] = $sect_id;
		}
		
		$sect_parent = $sects_by_id[$sect_id]['parent'];
		
		if ($sect_parent != 0) {
			$sections = array_merge(sect_ids_to_prods_build($sects_by_id, $sect_ids_to_products, $sect_parent), $sections);
			
			if (!in_array($sect_parent, $sections)) {
				$sections[] = $sect_parent;
			}
		} else {
			$sections = array_merge(sect_ids_to_prods_build($sects_by_id, $sect_ids_to_products), $sections);
		}
	}
	
	return $sections;
	
}

function pn_sections_menu($section) {
	
	$sections = array_merge([0 => ['id' => 0, 'name' => 'Без раздела']], pn_sections_get());
	
	$menu = '<select name="parent_section">';
	
	foreach ($sections as $_section) {
		$selected = $_section['id'] == $section['parent'] ? ' selected' : '';
		$disabled = $section['id'] == $_section['id'] ? ' disabled' : '';
		
		$menu .= "<option{$selected}{$disabled} value='{$_section['id']}'>{$_section['name']}</option>";
	}
		
	$menu .= '</select>';
	
	return $menu;
	
}

function pn_sections_tree($type = 1, $selected_sects = [], $current_sect = null) {
	
	$sections = pn_sections_get();
	
	$sections_by_parent = [];
	$sections_by_id = [];
	
	foreach ($sections as $section) {
		$sections_by_parent[$section['parent']][] = $section;
		$sections_by_id[$section['id']] = $section;
	}
	
	if ($type == 1) {
		$sect_ids_to_prods = sect_ids_to_prods_build($sections_by_id, pn_sect_ids_to_prods_get());
		$tree = pn_sects_tree_build($sections_by_parent, 0, $sect_ids_to_prods, $selected_sects[0]);
	} elseif($type == 2) {
		$tree = pn_sects_tree_build2($sections_by_parent, 0, $selected_sects);
	} elseif($type ==3) {
		$tree = '<select name="parent_section" class="sections-menu">';
		$tree .= '<option value="0"' . (!empty($selected_sects) && in_array(0, $selected_sects) ? ' selected' : '');
		$tree .= '>Без раздела</option>';
		$tree .= pn_sects_tree_build3($sections_by_parent, 0, $selected_sects, $current_sect);
		$tree .= '</select>';
	}
	
	return $tree;
	
}

function pn_sects_tree_build($sections, $parent_section, $sect_ids_to_prods, $selected_sect) {
	
	$tree = '';
	
	if (!empty($sections[$parent_section])) {
		$tree .= '<ul class="sections"' . ($parent_section == 0 ? ' id="sections-menu"' : '') . '>';
		
		foreach ($sections[$parent_section] as $section) {
			if (!in_array($section['id'], $sect_ids_to_prods)) {
				continue;
			}
			
			$expandable = !empty($sections[$section['id']]) && array_intersect(array_column($sections[$section['id']], 'id'), $sect_ids_to_prods) ? ' expandable' : '';
			$current = !empty($selected_sect) &&  $selected_sect == $section['id'] ? ' current' : '';
			
			$tree .= "<li class='section{$expandable}'>" . ($expandable ? '<i class="icon-chevron"></i>' : '');

			$part_tree = "<span class='{$current}'>{$section['name']}</span>";

			$tree .= $current ? $part_tree : "<a href='{$section['url']}'>$part_tree</a>";
			$tree .= pn_sects_tree_build($sections, $section['id'], $sect_ids_to_prods, $selected_sect);
			$tree .= '</li>';
		}
		
		$tree .= "</ul>";
		
		return $tree;
		
	}
	
	return null;
	
}

function pn_sects_tree_build2($sections, $parent_section, $selected_sects) {
	
	$tree = '';
	
	if (!empty($sections[$parent_section])) {
		$tree .= '<ul class="sections'. ($parent_section == 0 ? ' tree' : '') . '">';
		
		foreach ($sections[$parent_section] as $section) {
			$checked = !empty($selected_sects) && in_array($section['id'], $selected_sects) ? ' checked' : '';
			
			$tree .= "<li><label><input type='checkbox' value='{$section['id']}' name='sections[]'$checked>{$section['name']}</label>";
			$tree .= pn_sects_tree_build2($sections, $section['id'], $selected_sects);
			$tree .= '</li>';
		}
		
		$tree .=  '</ul>';
		
		return $tree;
	}
	
	return null;
	
}

function pn_sects_tree_build3($sections, $parent_section, $selected_sects, $current_sect, $level = 1) {
	
	$tree = '';

	if (!empty($sections[$parent_section])) {
		foreach ($sections[$parent_section] as $section) {
			if ($section['id'] == $current_sect) {
				continue;
			}
			
			$tree .= "<option value='{$section['id']}' class='show'"; 
			$tree .= (!empty($selected_sects) && in_array($section['id'], $selected_sects) ? ' selected' : '');
			$tree .= '>' . str_repeat('-', $level) . "{$section['name']}</option>";
			$tree .= pn_sects_tree_build3($sections, $section['id'], $selected_sects, $current_sect, ++$level);
			$level--;
		}
		
		return $tree;
	}
	
	return null;
	
}

function pn_get_section_url($section_id, $name) {
	
	$data_section = pn_section_by_get($section_id);
	$parent_url = $data_section['url'] ? $data_section['url'] : '/';
	
	return $parent_url . pn_str2slug($name) . '/';
	
}

function pn_sections_data_check($data, $id = false) {
	
	foreach ($data as $key => $item) {
		$data[$key] = trim($item);
	}
	
	if (empty($data['name'])) {
		pn_global_error("Название не указано");
	}
	
	if (!$id && pn_section_by_get($data['name'], 'name')) {
		pn_global_error("Раздел с таким названием уже существует");
	}
	
	if (pn_global_errors()) {
		return false;
	}
	
	return $data;
	
}

function pn_sections_add($data) {
	
	if (!$data = pn_sections_data_check($data)) {
		return false;
	}
	
	if (pn_global_errors()) {
		return false;
	}
	
	DB::query("
		INSERT INTO `sections`
		(`name`, `slug`, `parent`, `url`, `title`, `description`, `keywords`) VALUES (
		'" . DB::escape($data['name']) . "',
		'" . DB::escape(pn_str2slug($data['name'])) . "',
		'" . (int)$data['parent_section'] . "',
		'" . DB::escape(pn_get_section_url($data['parent_section'], $data['name'])) . "',
		'" . DB::escape($data['title']) . "',
		'" . DB::escape($data['description']) . "',
		'" . DB::escape($data['keywords']) . "'
		)
	");

	return true;
	
}

function pn_sections_edit($section, $data) {
	
	if (!$data = pn_sections_data_check($data, $section['id'])) {
		return false;
	}
	
	$slug = pn_str2slug($data['name']);
	
	DB::query("
		UPDATE `sections` SET
		`name` = '" . DB::escape($data['name']) . "',
		`slug` = '" . DB::escape($slug) . "',
		`parent` = " . (int)$data['parent_section'] . ",
		`url` = '" . DB::escape(pn_get_section_url($data['parent_section'], $data['name'])) . "',
		`title` = '" . DB::escape($data['title']) . "',
		`description` = '" . DB::escape($data['description']) . "',
		`keywords` = '" . DB::escape($data['keywords']) . "'
		WHERE `id` = " . (int)$section['id'] . "
	");
	
	DB::query("
		UPDATE `sections` SET 
		`url` = REPLACE(`url`, '/" . $section['slug'] . "/', '/" . DB::escape($slug) . "/')
		WHERE `url` LIKE '%/" . $section['slug'] . "/%'
	");
	
	return true;
	
}

function pn_sections_delete($id) {

	DB::query("UPDATE `sections` SET `del` = '1' WHERE `id` = '" . (int)$id . "'");
	
	return true;

}
