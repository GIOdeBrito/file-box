<?php

namespace FileBox\Controllers;

use Pabilsag\Attributes\Route;
use Pabilsag\Http\Response;

class ApiController
{
	#[Route(
		method: 'POST',
		path: '/api/v1/storage/get',
	)]
	public function serveFile ($req, $res): Response
	{
		$basePath = ABSPATH."/storage/public";

		$fileName = $req->getForm()->filename;

		return $res->status(200)->file("{$basePath}/{$fileName}", filename: $fileName);
	}

	#[Route(
		method: 'POST',
		path: '/api/v1/storage/upload',
	)]
	public function uploadFile ($req, $res): Response
	{
		// TODO: Increase file max size in php.ini

		return $res->status(200)->json($_FILES);
	}
}

?>