<?php

date_default_timezone_set('America/Fortaleza');
define('ABSPATH', __DIR__);

session_start();

require ABSPATH.'/vendor/pabilsag/Core/Autoloader.php';
require ABSPATH.'/src/Autoloader.php';
require ABSPATH.'/src/Helpers/Database.php';
require ABSPATH.'/src/Helpers/Disk.php';

use Pabilsag\Core\Application;

$app = new Application();

require ABSPATH.'/src/Bootstrap.php';

$app->run();

?>