<?php

use FileBox\Controllers\{ HomeController, ApiController };
use FileBox\Middlewares\{ UserService, LoginMiddleware };

use function FileBox\Helpers\Database\create_database_if_not_exists;

create_database_if_not_exists();

$app->loader()->setViewDirectory(ABSPATH.'/src/Views');
$app->loader()->setLayoutDirectory(ABSPATH.'/src/Layouts');
$app->loader()->importConnectionMetadata(ABSPATH.'/src/Configs/Connections.php');

$app->error()->useLogging();
$app->error()->setErrorCallback(function ()
{
	echo <<<HTML
		<h1>Exception. Consult the Log.</h1>
	HTML;
});

$app->router()->addController(HomeController::class);
$app->router()->addController(ApiController::class);

$app->middleware()->add(UserService::class);
$app->middleware()->add(LoginMiddleware::class);

?>