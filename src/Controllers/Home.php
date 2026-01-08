<?php

use GioPHP\Attributes\Route;
use GioPHP\Http\Response;

class Home
{
	#[Route(
		method: 'GET',
		path: '/',
		description: 'Home page'
	)]
	public function index ($req, $res): Response
	{
		$viewData = [
			'title' => 'Home'
		];

		return $res->status(200)->render('Home', 'main', $viewData);
	}

	#[Route(
		method: 'GET',
		path: '/contents',
		description: 'Storage content list page'
	)]
	public function contentList ($req, $res): Response
	{
		$folderItems = glob(ABSPATH.'/storage/*');
		$fileStructItemsCollection = [];

		foreach($folderItems as $item):

			if(is_dir($item))
			{
				continue;
			}

			$structFile = [];

			$parts = explode('/', $item);

			$structFile['name'] = end($parts);
			$structFile['path'] = $item;
			$structFile['mime'] = mime_content_type($item);
			$structFile['type'] = explode('/', mime_content_type($item))[0];

			$fileStructItemsCollection[] = $structFile;

		endforeach;

		$viewData = [
			'title' => 'Contents',
			'list' => $fileStructItemsCollection
		];

		return $res->status(200)->render('StorageList', 'main', $viewData);
	}

	#[Route(
		method: 'GET',
		path: '/404',
		description: 'Error page',
		isFallbackRoute: true
	)]
	public function errorPage ($req, $res): Response
	{
		$viewData = [
			'title' => 'Not Found'
		];

		return $res->status(200)->render('404', 'main', $viewData);
	}
}

?>