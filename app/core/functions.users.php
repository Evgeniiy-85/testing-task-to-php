<?php

function pn_users_get($id, $by = "id") {

	$user = false;
	
	switch ($by) {
		case "id":
			$id = (int)$id;
			if ($id) {
				$user = DB::query_fetch("SELECT * FROM `users` WHERE `id` = '" . DB::escape($id) . "' AND `del` = 0");
			}
		break;
		case "login":
			$user = DB::query_fetch("SELECT * FROM `users` WHERE `login` = '" . DB::escape($id) . "' AND `del` = 0");
		break;
	}
	
	if (!$user) {
		return false;
	}
	
	return $user;

}

function pn_users_data_proc($data) {

	$data['login'] = trim($data['login']);
	$data['status'] = trim($data['status']);
	
	return $data;

}

function pn_users_add($data, $password = false) {

	if (!$password) {
		$password = pn_hash($data['password']);
	}

	DB::query("
		INSERT INTO `users`
		(`login`, `status`, `password`) VALUES (
		'" . DB::escape($data['login']) . "',
		'" . DB::escape($data['status']) . "',
		'" . DB::escape($password) . "'
		)
	");
	
	$user_id = DB::insert_id();
	
	return $user_id;

}

function pn_users_delete($id) {
	
	DB::query("UPDATE `users` SET `del` = 1 WHERE `id` = '" . (int)$id . "'");
	
	return true;
	
}