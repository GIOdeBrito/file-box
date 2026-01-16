<?php

namespace FileBox\Controllers;

use Pabilsag\Attributes\Route;
use Pabilsag\Http\Response;

class LoginController
{
	#[Route(
		method: 'POST',
		path: '/api/v1/login/enter',
		description: 'Administer user log in'
	)]
	public function index ($req, $res): Response
	{
		return $res->json($req->getForm());
	}
}

?>