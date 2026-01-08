<?php

use GioPHP\Attributes\Route;
use GioPHP\Http\Response;

class OptionsController
{
	#[Route(
		method: 'GET',
		path: '/monologue',
		description: 'Dialogue page'
	)]
	public function monologuePage ($req, $res): Response
	{
		$viewData = [
			'title' => 'Inner Monologue'
		];

		return $res->status(200)->render('Home', '_layout', $viewData);
	}
}

?>