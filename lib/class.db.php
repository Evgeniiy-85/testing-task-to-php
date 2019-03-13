<?php

class DB {

	/**
	 * @var mysqli
	 */
	static public $link;

	/**
	 * @var bool
	 */
	static public $debug = false;
	
	
	public function __cunstruct() {
		
		return true;
		
	}
	
	static public function connect($host, $login, $password, $db) {
		
		$link = mysqli_connect($host, $login, $password, $db);
		
		if (!$link) {
			die("Error: " . mysqli_connect_error());
		}
		
		self::$link = $link;
		
		return $link;
		
	}
	
	static public function select_db($db) {
		
		return mysqli_select_db(self::$link, $db);
		
	}
	
	static public function set_charset($charset) {
		
		return mysqli_set_charset(self::$link, $charset);
		
	}
	
	static public function query($sql) {
	
		$result = mysqli_query(self::$link, $sql);
		
		if (!$result) {
			if (!self::$debug) {
				die("DB error");
			} else {
				die(self::error());
			}
		}
		
		return $result;
		
	}
	
	static public function fetch_assoc($result) {
		
		return mysqli_fetch_assoc($result);
		
	}
	
	static public function fetch_row($result) {
		
		return mysqli_fetch_row($result);
		
	}
	
	static public function query_fetch($sql) {
		
		$result = self::query($sql);
		
		if (self::num_rows($result) == 0) {
			return false;
		}
		
		return self::fetch_assoc($result);
		
	}
	
	static public function query_fetch_all($sql) {

		$result = self::query($sql);
		
		if (self::num_rows($result) == 0) {
			return false;
		}
		
		$assoc = array();
		
		while ($row = self::fetch_assoc($result)) {
			$assoc[] = $row;
		}

		return $assoc;

	}
	
	static public function query_fetch_all_by_id($sql) {

		$result = self::query($sql);
		$rows = array();
		
		if (self::num_rows($result) == 0) {
			return false;
		}

		while ($item = mysqli_fetch_assoc($result)) {
			if (!isset($item['id'])) {
				return false;
			}
			$rows[$item['id']] = $item;
		}
		
		return $rows;

	}
	
	static public function num_rows($result) {

		return mysqli_num_rows($result);

	}
	
	static public function query_num_rows($sql) {

		$result = self::query($sql);

		return self::num_rows($result);

	}
	
	static public function affected_rows() {

		return mysqli_affected_rows(self::$link);

	}
	
	static public function query_affected_rows($sql) {

		self::query($sql);

		return self::affected_rows();

	}
	
	static public function found_rows() {

		$found_rows_result = self::query("SELECT FOUND_ROWS()");
		$found_rows = self::fetch_row($found_rows_result);
		
		return $found_rows[0];

	}
	
	static public function select_max($field, $table, $extra = "") {

		$result = self::query_fetch("SELECT MAX(`" . self::escape($field) . "`) AS `max` FROM `" . self::escape($table) . "` " . $extra);

		return $result['max'];

	}
	
	static public function select_min($field, $table, $extra = "") {

		$result = self::query_fetch("SELECT MIN(`" . self::escape($field) . "`) AS `min` FROM `" . self::escape($table) . "` " . $extra);

		return $result['min'];

	}
	
	static public function insert_id() {

		return mysqli_insert_id(self::$link);

	}
	
	static public function escape($string) {
	
		return mysqli_real_escape_string(self::$link, $string);
		
	}
	
	static public function version() {
		
		$version = mysqli_fetch_assoc(self::query("SELECT VERSION()"));
		
		return $version['VERSION()'];
		
	}
	
	static public function error() {

		return mysqli_error(self::$link);
		
	}
	
	static public function ping() {

		return mysqli_ping(self::$link);
		
	}
	
	static public function close() {
		
		return mysqli_close(self::$link);
		
	}
	
}