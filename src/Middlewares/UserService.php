<?php

namespace FileBox\Middlewares;

use Pabilsag\Interfaces\MiddlewareInterface;

class UserService implements MiddlewareInterface
{
	public function handle ($req, $res, callable $next)
	{
		if(!isset($_SESSION['given_name']))
		{
			$_SESSION['given_name'] = $this->getRandomName();
		}

		return $next($req, $res);
	}

	public function getRandomName (): string
	{
		$names = [
			'Tukulti Ninurta',
			'Shamshi Adad',
			'Nabu Kudurri Utsur',
			'Arad Egi',
			"Nabu Na'id"
		];

		return $names[rand(0, count($names) - 1)];
	}
}

?>