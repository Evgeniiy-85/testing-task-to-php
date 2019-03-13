<?php

define("APP_DIR",    realpath(dirname(__FILE__)) . "/../app/");
define("LIB_DIR",    realpath(dirname(__FILE__)) . "/../lib/");
define("ASSETS_DIR", realpath(dirname(__FILE__)) . "/_assets/");
define("UPLOAD_DIR", realpath(dirname(__FILE__)) . "/_upload/");

include_once(APP_DIR . "common.php");

$router = new Router();

$router->start();