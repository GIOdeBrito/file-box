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
		$storagePath = ABSPATH.'/storage/public';

		$uploadedFile = $_FILES['attachment'];

		$fullNamePath = explode('.', $uploadedFile['name']);

		$name = $fullNamePath[0];
		$ext = $fullNamePath[1];
		$tempPath = $uploadedFile['tmp_name'];

		if(!move_uploaded_file("{$tempPath}", "{$storagePath}/{$name}"))
		{
			return $res->status(500)->json([
				'message' => 'An internal error ocurred',
				'error' => true
			]);
		}

		return $res->status(200)->json([
			'message' => "File was successfully uploaded to the storage",
			'error' => false
		]);
	}
}

?>