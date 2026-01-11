<?php

namespace FileBox\Controllers;

use Pabilsag\Attributes\Route;
use Pabilsag\Http\Response;

class ApiController
{
	#[Route(
		method: 'POST',
		path: '/api/v1/storage/get',
		description: 'Storage file download'
	)]
	public function serveFile ($req, $res): Response
	{
		$basePath = ABSPATH."/storage/public";

		$fileName = $req->getForm()->filename;

		return $res->status(200)->file("{$basePath}/{$fileName}", filename: $fileName);
	}
}

?>