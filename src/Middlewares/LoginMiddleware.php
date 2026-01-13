<?php

namespace FileBox\Middlewares;

use Pabilsag\Interfaces\MiddlewareInterface;

class LoginMiddleware implements MiddlewareInterface
{
	public function handle ($req, $res, callable $next)
	{
		if(!isset($_SESSION['is_logged']))
		{
			return $res->render('Login', 'main', [ 'title' => 'Log-in' ]);
		}

		return $next($req, $res);
	}
}

?>