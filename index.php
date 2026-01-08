<?php

date_default_timezone_set('America/Fortaleza');
define('ABSPATH', __DIR__);

session_start();

require ABSPATH.'/vendor/GioPHP/Core/Autoloader.php';

// Controllers
require ABSPATH.'/src/Controllers/Home.php';
require ABSPATH.'/src/Controllers/OptionsController.php';
require ABSPATH.'/src/Controllers/ApiController.php';

// Middlewares
require ABSPATH.'/src/Middlewares/UserService.php';

use GioPHP\Core\Application;

$app = new Application();

$app->loader()->setViewDirectory(ABSPATH.'/src/Views');
$app->loader()->setLayoutDirectory(ABSPATH.'/src/Layouts');

$app->error()->useLogging();
$app->error()->setErrorCallback(function ()
{
	echo <<<HTML
		<h1>Exception. Consult the Log.</h1>
	HTML;
});

$app->router()->addController(Home::class);
$app->router()->addController(ApiController::class);

$app->middleware()->add(UserService::class);

$app->run();

?>