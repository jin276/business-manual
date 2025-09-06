<?php
declare(strict_types=1);

session_start();

define('dns', 'mysql:host=db; dbname=manual; charset=utf8mb4');
define('dbuser', 'root');
define('dbpass', 'rootpass');
define('SITE_TOP', 'http://localhost:8080/top.php');
define('SITE_LOGIN', 'http://localhost:8080/login.php');
define('SITE_VIEW', 'http://localhost:8080/view.php');

require_once(__DIR__ . '/functions.php');

?>