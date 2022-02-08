<?php

define('ROOT_DIR', __DIR__);

require_once 'config/config.php';
require_once 'vendor/Debugging.php';
require_once 'database/Database.php';
require_once 'vendor/Path.php';
require_once 'vendor/Router.php';
require_once 'vendor/Fields.php';
require_once 'vendor/Auth.php';

$router = new Router();

session_start();

$conn = Database::getConnection(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

require_once 'routes/routes.php';

