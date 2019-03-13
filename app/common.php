<?php

if (!preg_match("/\/$/", $_SERVER['REQUEST_URI']) && empty($_GET)) {
	header("HTTP/1.0 301 Moved Permanently");
	header("Location: http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . "/");
}

require_once("config.php");

if (!extension_loaded("mbstring")) {
	die("mbstring not installed");
}

date_default_timezone_set(Config::$default_timezone);

session_start();

mb_internal_encoding("UTF-8");

require_once(LIB_DIR . "class.db.php");
require_once(LIB_DIR . "class.images.php");

require_once(APP_DIR . "core/functions.common.php");
require_once(APP_DIR . "core/functions.static_pages.php");
require_once(APP_DIR . "core/functions.users.php");
require_once(APP_DIR . "core/functions.news.php");
require_once(APP_DIR . "core/functions.products.php");
require_once(APP_DIR . "core/functions.sections.php");
require_once(APP_DIR . "core/functions.articles.php");
require_once(APP_DIR . "core/functions.menu.php");
require_once(APP_DIR . "core/class.users.php");
require_once(APP_DIR . "core/class.router.php");
require_once(APP_DIR . "core/class.controller.php");
require_once(APP_DIR . "core/class.model.php");

DB::$debug = Config::$debug;

if (!DB::connect(Config::$db_host, Config::$db_user, Config::$db_password, Config::$db_name)) {
	die("DB connect error");
}

DB::set_charset("UTF8");