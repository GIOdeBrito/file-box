<?php

use GioPHP\Attributes\Route;
use GioPHP\Http\Response;

class ApiController
{
	#[Route(
		method: 'POST',
		path: '/api/v1/storage/get',
		description: 'Storage file download'
	)]
	public function serveFile ($req, $res): Response
	{
		$basePath = ABSPATH."/storage";

		$fileName = $req->getForm()->filename;

		return $res->status(200)->file("{$basePath}/{$fileName}", filename: $fileName);
	}
}

?>